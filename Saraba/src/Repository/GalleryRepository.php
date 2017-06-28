<?php

namespace Repository;

use Entity\Gallery;


class GalleryRepository extends RepositoryAbstract {
    
      public function findAll(){
        $query = <<<EOS
SELECT g.* FROM gallery g
EOS;
        $dbGallerys = $this -> db -> fetchAll($query);
        $gallerys = [];
        
        foreach ($dbGallerys as $dbGallery) {
            
            $gallery = $this->buildGalleryFromArray($dbGallery);
            
            $gallerys[] = $gallery;
        }
        return $gallerys;
    }
    
    public function save(Gallery $gallery){

            $this->insert($gallery);
    }
    
    public function insert(Gallery $gallery){
        
        $this->db->insert(
            'gallery',
            ['img' => $gallery->getImg(),
            ] // valeurs
        );
    }


    public function delete(Gallery $gallery ){
        
        $this->db->delete('gallery',['id'=> $gallery->getId()]);
        
    }
    
    private function buildGalleryFromArray(array $dbGallery){
        
        // var_dump($dbArticle);
        $gallery = new Gallery(); // $article est un objet instance de la classe Entity article
        $gallery
            ->setId($dbGallery['id'])
            ->setImg($dbGallery['img']);
        return $gallery;

    }
    
    public function find($id){
 $query = <<<EOS
SELECT g.* FROM gallery g WHERE id = :id
EOS;
        $dbGallery = $this->db->fetchAssoc(
            $query, [':id' => $id]);
        
        $gallery = $this->buildGalleryFromArray($dbGallery);
        return $gallery;
    }

}

<?php

namespace Repository;

use Entity\Partner;



class PartnerRepository extends RepositoryAbstract{
    
    public function findAll(){
        $query = <<<EOS
SELECT p.* FROM partner p
EOS;
        $dbPartners = $this -> db -> fetchAll($query);
        $partners = [];
        
        foreach ($dbPartners as $dbPartner) {
            
            $partner = $this->buildPartnerFromArray($dbPartner);
            
            $partners[] = $partner;
        }
        return $partners;
    }
    
    public function save(Partner $partner){
        
        if(!empty($partner->getId())) {
            $this->update($partner);
        }else{
            $this->insert($partner);
        }
    }
    
    public function insert(Partner $partner){
        
        $this->db->insert(
            'partner',
            ['title' => $partner->getTitle(),
            'content' => $partner->getContent(),
            'img' => $partner->getImg(),
            ] // valeurs
        );
    }
    
    public function update(Partner $partner){
         $this->db->update(
            'partner', // nom de la table
            ['title' => $partner->getTitle(),
            'content' => $partner->getContent(),
            'img' => $partner->getImg(),
            ], //valeurs
            ['id' => $partner->getId()] // clause WHERE
        );
        
    }

    public function delete(Partner $partner ){
        
        $this-> db->delete('partner',['id'=> $partner->getId()]);
        
    }
    
    private function buildPartnerFromArray(array $dbPartner){
        
        // var_dump($dbPartner);
        $partner = new Partner(); // $partner est un objet instance de la classe Entity partner
        $partner
            ->setId($dbPartner['id'])
            ->setTitle($dbPartner['title'])
            ->setContent($dbPartner['content'])
            ->setImg($dbPartner['img']);
        return $partner;

    }
    
    public function find($id){
 $query = <<<EOS
SELECT p.* FROM partner p WHERE id = :id
EOS;
        $dbPartner = $this->db->fetchAssoc(
            $query, [':id' => $id]);
        
        $partner = $this->buildPartnerFromArray($dbPartner);
        return $partner;
    }
}

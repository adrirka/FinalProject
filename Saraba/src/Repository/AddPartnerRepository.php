<?php

namespace Repository;

use Entity\AddPartner;

class AddPartnerRepository extends RepositoryAbstract {

    public function findAll(){
        $query = <<<EOS
SELECT a.* FROM addpartner a
EOS;
        $dbAddPartners = $this -> db -> fetchAll($query);
        $addpartners = [];
        
        foreach ($dbAddPartners as $dbAddPartner) {
            
            $addpartner = $this->buildAddPartnerFromArray($dbAddPartner);
            
            $addpartners[] = $addpartner;
        }
        return $addpartners;
    }
    
    public function save(AddPartner $addpartner){
        
        $this->insert($addpartner);
    }
    
    public function insert(AddPartner $addpartner){
        
        $this->db->insert(
            'addpartner',
            ['title' => $addpartner->getTitle(),
            'content' => $addpartner->getContent(),
            'nom' => $addpartner->getName(),
            'email' => $addpartner->getEmail(),
            'sujet' => $addpartner->getSubject(),
            'message' => $addpartner->getMessage(),

            //'img' => $addpartner->getImg(),
            ] // valeurs
        );
        
    }
    
    public function delete(AddPartner $addpartner ){
        
        $this-> db->delete('addpartner',['id'=> $addpartner->getId()]);
        
    }
    
    private function buildAddPartnerFromArray(array $dbAddPartner){
        
        // var_dump($dbAddPartner);
        $addpartner = new AddPartner(); // $partner est un objet instance de la classe Entity partner
        $addpartner
            ->setId($dbAddPartner['id'])
            ->setTitle($dbAddPartner['title'])
            ->setContent($dbAddPartner['content'])
            ->setName($dbAddPartner['nom'])
            ->setEmail($dbAddPartner['email'])
            ->setSubject($dbAddPartner['sujet'])
            ->setMessage($dbAddPartner['message'])

            ->setImg($dbAddPartner['img']);
        return $addpartner;

    }
    
    public function find($id){
 $query = <<<EOS
SELECT a.* FROM addpartner a WHERE id = :id
EOS;
        $dbAddPartner = $this->db->fetchAssoc(
            $query, [':id' => $id]);
        
        $addpartner = $this->buildAddPartnerFromArray($dbAddPartner);
        return $addpartner;
    }
}

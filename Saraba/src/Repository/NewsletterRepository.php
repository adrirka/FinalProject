<?php

namespace Repository;

use Entity\Newsletter;


class NewsletterRepository extends RepositoryAbstract{
      public function findAll(){
        $query = <<<EOS
SELECT n.* FROM newsletter n
EOS;
        $dbNewsletters = $this -> db -> fetchAll($query);
        $newsletters = [];
        
        foreach ($dbNewsletters as $dbNewsletter) {
            
            $newsletter = $this->buildNewsletterFromArray($dbNewsletter);
            
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }
    
    function buildNewsletterFromArray(array $dbNewsletter){
        $newsletter = new Newsletter(); // $newsletter est un objet instance de la classe Entity newsletter
        $newsletter
            ->setId($dbNewsletter['id'])
            ->setEmail($dbNewsletter['email'])
            ->setDate($dbNewsletter['date']);
        return $newsletter;
    }
}



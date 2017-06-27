<?php

namespace Repository;

class NewsletterRepository extends RepositoryAbstract{
      public function findAll(){
        $query = <<<EOS
SELECT n.* FROM newsletter n
EOS;
        $dbNewsletters = $this -> db -> fetchAll($query);
        $newsletters = [];
        
        foreach ($dbNewsletters as $dbNewsletter) {
            
            $newsletter = $this->buildGalleryFromArray($dbNewsletter);
            
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }
}

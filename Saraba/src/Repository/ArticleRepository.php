<?php
namespace Repository;

use Entity\Article;

class ArticleRepository extends RepositoryAbstract {

    public function findAll(){
        $query = <<<EOS
SELECT a.* FROM article a
EOS;
        $dbArticles = $this -> db -> fetchAll($query);
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            
            $article = $this->buildArticleFromArray($dbArticle);
            
            $articles[] = $article;
        }
        return $articles;
    }
    
    public function save(Article $article){
        
        if(!empty($article->getId())) {
            $this->update($article);
        }else{
            $this->insert($article);
        }
    }
    
    public function insert(Article $article){
        
        $this->db->insert(
            'article',
            ['title' => $article->getTitle(),
            'content' => $article->getContent(),
            'short_content' => $article->getShortContent(),
            'img' => $article->getImg(),

            ] // valeurs
        );
    }
    
    public function update(Article $article){
         $this->db->update(
            'article', // nom de la table
            ['title' => $article->getTitle(),
            'content' => $article->getContent(),
            'short_content' => $article->getShortContent(),
            'img' => $article->getImg(),
            ], //valeurs
            ['id' => $article->getId()] // clause WHERE
        );
        
    }

    public function delete(Article $article ){
        
        $this-> db->delete('article',['id'=> $article->getId()]);
        
    }
    
    private function buildArticleFromArray(array $dbArticle){
        
        var_dump($dbArticle);
        $article = new Article(); // $article est un objet instance de la classe Entity article
        $article
            ->setId($dbArticle['id'])
            ->setTitle($dbArticle['title'])
            ->setContent($dbArticle['content'])
            ->setShortContent($dbArticle['short_content'])
            ->setImg($dbArticle['img']);
        return $article;

    }
    
    public function find($id){
          
        $dbArticle = $this->db->fetchAssoc(
            $query, [':id' => $id]);
        
        $article = $this->buildArticleFromArray($dbArticle);
        return $article;
    }
}


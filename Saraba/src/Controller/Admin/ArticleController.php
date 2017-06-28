<?php
namespace Controller\Admin;

use Controller\ControllerAbstract;
use Entity\Article;
use Symfony\Component\HttpFoundation\Request;


class ArticleController extends ControllerAbstract{
    public function listAction(){
        $articles = $this->app['article.repository']->findAll();
        
        return $this->render('admin/article/list.html.twig', ['articles' => $articles]);
    }
    
    public function editAction(Request $request, $id = null){
        
        if(!is_null($id)){  
            $article = $this->app['article.repository']->find($id);
        }
        else{
            $article = new Article();
        }
        
        if (!empty($_POST)){
            echo '<pre>';
            var_dump(realpath(__DIR__ . '/../../../web/img/'));
            var_dump($_FILES);
            echo '</pre>';
           
              if(!empty($_FILES['img'] ['name'])){ // si une image a été uploadée, $_FILES est remplie
              
                // on constitue un nom unique pour le fichier photo :
                $nom_photo = uniqid(). '_' . $_FILES['img']['name']; 
                
                // On constitue le chemin de la photo enregistré en BDD :
                $photo = realpath(__DIR__ . '/../../../web/img/') . '/' . $nom_photo;  // On obtient ici le nom et le chemin de la photo depuis la racine du site
                
                // Enregistrement du fichier photo sur le serveur : 
                copy($_FILES['img']['tmp_name'], $photo); // on copie le fichier tempoiraire de la photo stockée au chemin indiqué par $_FILES['img'] ['tmp_name']
                
                if (!empty($article->getImg())) {
                    unlink(realpath(__DIR__ . '/../../../web/img/') . '/' . $article->getImg());
                }
                
                $article->setImg($nom_photo);
             }
             
             
            $article->setTitle($_POST['title'])
                    ->setContent($_POST['content'])
                    ->setShortContent($_POST['short_content']);


            $this->app['article.repository']->save($article); // save vérifie que l'id existe, si non => insert, si oui => update
            $this->addflashMessage('L\'actu est enregistrée');
            
            return $this->redirectRoute('admin_articles');

        }
                
        return $this->render(
                'admin/article/edit.html.twig',
                ['article' => $article]
        );
    }
    
    public function deleteAction($id){
        
         $article = $this->app['article.repository']->find($id);
        
        $this->app['article.repository']->delete($article);
        $this->addflashMessage('L\'actu à été supprimée');
        
        return $this->redirectRoute('admin_articles');
    }
}

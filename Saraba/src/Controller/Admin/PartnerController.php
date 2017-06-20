<?php
namespace Controller\Admin;

use Controller\ControllerAbstract;
use Entity\Partner;
use Symfony\Component\HttpFoundation\Request;


class PartnerController extends ControllerAbstract{

     public function listAction(){
        $partners = $this->app['partner.repository']->findAll();
        
        return $this->render('admin/partner/list.html.twig', ['partners' => $partners]);
    }
    
    public function editAction(Request $request, $id = null){
        
        if(!is_null($id)){  
            $partner = $this->app['partner.repository']->find($id);
        }
        else{
            $partner = new Partner();
        }
        
        if (!empty($_POST)){
            echo '<pre>';
            var_dump(realpath(__DIR__ . '/../../../web/img/'));
            var_dump($_FILES);
            echo '</pre>';
           
              if(!empty($_FILES['img'] ['name'])){ // si une image a été uploadée, $_FILES est remplie
                // on constitue un nom unique pour le fichier photo :
                $nom_photo = $_POST['title'] . '_' . $_FILES['img']['name']; 
                // On constitue le chemin de la photo enregistré en BDD :
                $photo = realpath(__DIR__ . '/../../../web/img/') . '/' . $nom_photo;  // On obtient ici le nom et le chemin de la photo depuis la racine du site
                // dd($photo);
         
                // On constitue le chemin absolu complet de la photo depuis la racine serveur :
                //$photo_dossier = $request->getBasePath() . $photo;
                
                //  echo '<pre>'; print_r($photo_dossier); echo '</pre>';
                // Enregistrement du fichier photo sur le serveur : 
                copy($_FILES['img']['tmp_name'], $photo); // on copie le fichier tempoiraire de la photo stockée au chemin indiqué par $_FILES['photo'] ['tmp_name'] dans le chemin $photo_dossier de notre serveur
                
                if (!empty($partner->getImg())) {
                    unlink(realpath(__DIR__ . '/../../../web/img/') . '/' . $partner->getImg());
                }
                
                $partner->setImg($nom_photo);
                
             }
             
             
            $partner->setTitle($_POST['title'])
                    ->setContent($_POST['content']);


            $this->app['partner.repository']->save($partner); // save vérifie que l'id existe, si non => insert, si oui => update
            $this->addflashMessage('Le partner est enregistrée');
            
            return $this->redirectRoute('admin_partners');

        }
                
        return $this->render(
                'admin/partner/edit.html.twig',
                ['partner' => $partner]
        );
    }
    
    public function deleteAction($id){
        
         $partner = $this->app['partner.repository']->find($id);
        
        $this->app['partner.repository']->delete($partner); // save vérifie que l'id existe, si non => insert, si oui => update
        $this->addflashMessage('Le partner est supprimée');
        
        return $this->redirectRoute('admin_partners');
    }
}

<?php
namespace Controller\Admin;

use Controller\ControllerAbstract;
use Entity\Gallery;


class GalleryController extends ControllerAbstract {
    public function listAction(){
        $gallerys = $this->app['gallery.repository']->findAll();
        
        return $this->render('admin/gallery/list.html.twig', ['gallerys' => $gallerys]);
    }
    
    public function editAction(){
        
        $gallery = new Gallery();
        

        if(!empty($_FILES['img'] ['name'])){ // si une image a été uploadée, $_FILES est remplie
            // on constitue un nom unique pour le fichier photo :
            $nom_photo = uniqid() . '_' . $_FILES['img']['name']; 
            // On constitue le chemin de la photo enregistré en BDD :
            $photo = realpath(__DIR__ . '/../../../web/img/') . '/' . $nom_photo;  // On obtient ici le nom et le chemin de la photo depuis la racine du site
            // dd($photo);

            // On constitue le chemin absolu complet de la photo depuis la racine serveur :
            //$photo_dossier = $request->getBasePath() . $photo;

            //  echo '<pre>'; print_r($photo_dossier); echo '</pre>';
            // Enregistrement du fichier photo sur le serveur : 
            copy($_FILES['img']['tmp_name'], $photo); // on copie le fichier tempoiraire de la photo stockée au chemin indiqué par $_FILES['photo'] ['tmp_name'] dans le chemin $photo_dossier de notre serveur


            $gallery->setImg($nom_photo);

            $this->app['gallery.repository']->save($gallery); // save vérifie que l'id existe, si non => insert, si oui => update
            $this->addflashMessage('L\'image a bien été enregistrée');

            return $this->redirectRoute('admin_gallerys');
        }

                
        return $this->render(
                'admin/gallery/edit.html.twig',
                ['gallery' => $gallery]
        );
    }
    
    public function deleteAction($id){
        
         $gallery = $this->app['gallery.repository']->find($id);
        
        $this->app['gallery.repository']->delete($gallery); // save vérifie que l'id existe, si non => insert, si oui => update
        $this->addflashMessage('L\'image à bien été supprimée');
        
        return $this->redirectRoute('admin_gallerys');
    }
}

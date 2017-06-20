<?php


namespace Controller;


class PartnerController {
    
    public function formPartnerAjaxAction() {
        $contenu = '';
    //-------------------- TRAITEMENT ---------------------- ;

	//Traitement du POST :;

            if(!empty($_POST)){ // si le formulaire est postÃ©;
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';

                    // validation du formulaire :;
                            if(strlen($_POST['name']) < 4 || strlen($_POST['name']) > 40){
                                    $contenu .= '<div>Le nom doit contenir au moins 4 caractÃ¨res</div>';
                            }
                            else{
                                    true;
                            }

                            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                                    $contenu .= '<div>L\'email est invalide</div>';                        
                            }
                            else{
                                    true;
                            }

                            if ($_POST['subject'] != 'contacts' && $_POST['subject'] != 'rdv'){
                                    $contenu .= '<div class="bg-danger">Le sujet est incorrecte</div>';
                            }
                            else{
                                    true;
                            }

                            if(strlen($_POST['message']) < 10 || strlen($_POST['message']) > 255){
                                    $contenu .= '<div>Le message doit contenir au moins 10 caractÃ¨res</div>';
                            }
                            else{
                                    true;
                            }

                            // Si aucune erreur sur le formuaire avant envoi sur l'adresse email;
                            if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur;
                                    if($_POST){

                                        echo $_POST['subject'];
                                        echo $_POST['message'];
                                        echo $_POST['email'];

                                        $_POST['email'] = "From: $_POST[email]  \n"; 
                                        $_POST['email'] .= "MIME-Version: 1.0 \r\n";
                                        $_POST['email'] .= "Content-type: text/html; charset=iso-8859-1 \r\n";
                                        $_POST['message'] = "Nom : " . $_POST['name'] . "\nMessage : " . $_POST['message']; // nous mettons toutes les informations dans le message sans oublier le message en question.;

                                        mail("rodrigues.alexandrepro@gmail.com", $_POST['subject'], $_POST['message'], $_POST['email']); // la fonction mail() reÃ§oit toujours 4 ARGUMENTS et l'ordre Ã  une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le NOMBRE et l'ORDRE des arguments que l'on transmet.;

                                    }
                            }
                            else{
                                    echo 'ProblÃ¨me d\'envoi il dois y avoir une erreur sur votre saisi';
                            }		
            }
	echo $contenu; 
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
            unset($_POST['name']);
            unset($_POST['message']);
            unset($_POST['email']);
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
    }
    
    public function formAction(Request $request, $id = null){
        
        if(!is_null($id)){  
            $addpartner = $this->app['addpartner.repository']->find($id);
        }
        else{
            $addpartner = new Partner();
        }
        
        if (!empty($_POST)){
            
            //Test de récupération
            
                //echo '<pre>';
                // var_dump(realpath(__DIR__ . '/../../../web/img/'));
                // var_dump($_FILES);
                //echo '</pre>';
           
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
                
                if (!empty($addpartner->getImg())) {
                    unlink(realpath(__DIR__ . '/../../../web/img/') . '/' . $addpartner->getImg());
                }
                
                $addpartner->setImg($nom_photo);
                
             }
             
             
            $addpartner->setTitle($_POST['title'])
                    ->setContent($_POST['content']);


            $this->app['addpartner.repository']->save($addpartner); // save vérifie que l'id existe, si non => insert, si oui => update
            $this->addflashMessage('Le partner est enregistrée');
            
            return $this->redirectRoute('addpartners');

        }
                
        return $this->render(
                'addpartner/edit.html.twig',
                ['addpartner' => $addpartner]
        );
    }
}

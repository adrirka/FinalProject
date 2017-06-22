<?php

namespace Controller;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends ControllerAbstract{
    
    
    public function formHomeAjaxAction() {
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

                            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                                    $contenu .= '<div>L\'email est invalide</div>';                        
                            }

                            if ($_POST['subject'] != 'rdv' && $_POST['subject'] != 'projet_sejour_de_rupture' && $_POST['subject'] != 'atelier_therapeutique'){
                                    $contenu .= '<div class="bg-danger">Le sujet est incorrecte</div>';
                            }

                            if(strlen($_POST['message']) < 10 || strlen($_POST['message']) > 255){
                                    $contenu .= '<div>Le message doit contenir au moins 10 caractÃ¨res</div>';
                            }
                            
                            // Si aucune erreur sur le formuaire avant envoi sur l'adresse email;
                            if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur;

                                        echo $_POST['subject'];
                                        echo $_POST['message'];
                                        echo $_POST['email'];

                                        $headers = "From: $_POST[email]  \n"; 
                                        $headers .= "MIME-Version: 1.0 \r\n";
                                        $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
                                        $message = "Nom : " . $_POST['name'] . "\nMessage : " . $_POST['message']; // nous mettons toutes les informations dans le message sans oublier le message en question.;

                                        @mail("rodrigues.alexandrepro@gmail.com", $_POST['subject'], $message, $headers); // la fonction mail() reÃ§oit toujours 4 ARGUMENTS et l'ordre Ã  une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le NOMBRE et l'ORDRE des arguments que l'on transmet.

                            }
                            else{
                                    echo 'ProblÃ¨me d\'envoi il dois y avoir une erreur sur votre saisi';
                            }		
 
             }
             return new Response($contenu); 
    }
    public function indexAction(){
        
        return $this->render('index.html.twig');
    }
}



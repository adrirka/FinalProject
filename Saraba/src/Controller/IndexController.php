<?php

namespace Controller;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends ControllerAbstract{
    
    
    public function formHomeAjaxAction() {
        $contenu = '';
    //-------------------- TRAITEMENT ---------------------- ;

	//Traitement du POST :;

            if(!empty($_POST['contact-button'])){ // si le formulaire est postÃ©;
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
                                    $contenu .= '<div>Le message doit contenir au moins 10 caractères</div>';
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
                                    echo 'Problème d\'envoi, il doit y avoir une erreur sur votre saisie';
                            }		
 
             }
             return new Response($contenu); 
    }
    public function indexAction(){
        
        if (isset($_POST['signup-button'])) {
            $email    = $_POST['signup-email'];
            $datetime = date('Y-m-d H:i:s');
            $valid = true;

            if (empty($email)) {
                $status  = "error";
                $message = "Le champs email est obligatoire";
                $valid = false;
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status  = "error";
                $message = "Veuillez entrer un email valide";
                $valid = false;
            }

            if ($valid) {
                $pdo = $this->app['db'];
                $existingSignup = $pdo->prepare("SELECT COUNT(*) FROM newsletter WHERE email='$email'");
                $existingSignup->execute();
                $data_exists = ($existingSignup->fetchColumn() > 0) ? true : false;

                if (!$data_exists) {
                    $sql = "INSERT INTO newsletter (email, date) VALUES (:email, :date)";
                    $q = $pdo->prepare($sql);

                    $q->execute(
                        array(':email' => $email, ':date' => $datetime));

                    if ($q) {
                        $status  = "success";
                        $message = "Vous êtes inscrit avec succès";
                    } else {
                        $status  = "error";
                        $message = "Une erreur est survenue, veuillez réessayer";
                    }
                } else {
                    $status  = "error";
                    $message = "Cet email existe déjâ";
                }
            }
        }
        
        return $this->render('index.html.twig');
    }
}



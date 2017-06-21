<?php

namespace Controller;


class PageContactController  extends ControllerAbstract {
    
    public function contactAction(){
        //$contacts = $this->app['contact.repository']->findAll();
        
        return $this->render(
                'contact_list.html.twig'
               // ['contacts' => $contacts]
        );
    }
}
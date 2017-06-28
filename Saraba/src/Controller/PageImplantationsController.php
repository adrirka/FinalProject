<?php

namespace Controller;


class PageImplantationsController  extends ControllerAbstract {
    
    public function implantationsAction(){

        
        return $this->render(
                'implantations_list.html.twig'
        );
    }
}
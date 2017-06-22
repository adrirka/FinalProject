<?php

namespace Controller;

class PageMembreController extends ControllerAbstract {

        public function membreAction(){

        return $this->render(
                'membre_list.html.twig'
        );
    }
}

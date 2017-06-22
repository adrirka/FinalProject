<?php

namespace Controller;

class PageActionController extends ControllerAbstract{
    
    public function actionAction(){
        
        return $this->render(
                'action_list.html.twig'
        );
    }
}

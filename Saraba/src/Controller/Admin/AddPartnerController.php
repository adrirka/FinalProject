<?php

namespace Controller\Admin;

use Controller\ControllerAbstract;

class AddPartnerController extends ControllerAbstract{

    public function listAction(){
        $addpartners = $this->app['addpartner.repository']->findAll();
        
        return $this->render('admin/addpartner/list.html.twig', ['addpartners' => $addpartners]);
    }
    
    public function acceptAction($id){
        
        $addpartner = $this->app['addpartner.repository']->find($id);
        $addpartner->setStatus($_POST['status']);
        
        $this->app['addpartner.repository']->save($addpartner);
        
        $this->addflashMessage('Le partner est ajouter');
        
        return $this->redirectRoute('admin_addpartners');
        
    }
    
    public function refuseAction($id){
        
        $addpartner = $this->app['addpartner.repository']->find($id);
        $addpartner->setStatus($_POST['status']);
        
        $this->app['addpartner.repository']->save($addpartner);
        
        $this->addflashMessage('Le partner est refusée');
        
        return $this->redirectRoute('admin_addpartners');
    }
}

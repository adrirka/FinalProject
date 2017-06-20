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
        $addpartner->setStatus('accepted');
                  
        $partner = new \Entity\Partner();
        
        $partner->setTitle($addpartner->getPartner());
        $partner->setContent($addpartner->getPartner());
        $partner->setImg($addpartner->getPartner());

        $this->app['addpartner.repository']->save($addpartner);
        
        $this->addflashMessage('Le partner est accepter');
        
        return $this->redirectRoute('admin_partner_edit', ['id' => $partner->getId()]);
        
    }
    
    public function refuseAction($id){
        
        $addpartner = $this->app['addpartner.repository']->find($id);
        $addpartner->setStatus('refused');
        
        $this->app['addpartner.repository']->save($addpartner);
        
        $this->addflashMessage('Le partner est refuser');
        
        return $this->redirectRoute('admin_addpartners');
    }
}

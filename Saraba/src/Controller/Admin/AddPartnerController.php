<?php

namespace Controller\Admin;

use Controller\ControllerAbstract;
use Entity\Partner;

class AddPartnerController extends ControllerAbstract{

    public function listAction(){
        $addpartners = $this->app['addpartner.repository']->findAll();
        
        return $this->render('admin/addpartner/list.html.twig', ['addpartners' => $addpartners]);
    }
    
    public function acceptAction($id){
        
        $addpartner = $this->app['addpartner.repository']->find($id);
        $addpartner->setStatus('accepted');
                  
        $partner = new Partner();
        
        $partner->setTitle($addpartner->getTitle());
        $partner->setContent($addpartner->getContent());
        $partner->setImg($addpartner->getImg());
        $this->app['partner.repository']->save($partner);
        
        $this->app['addpartner.repository']->updateStatus($addpartner);
        
        $this->addflashMessage('Le partner est accepté');
        
        return $this->redirectRoute('admin_partner_edit', ['id' => $partner->getId()]);
        
    }
    
    public function refuseAction($id){
        
        $addpartner = $this->app['addpartner.repository']->find($id);
        $addpartner->setStatus('refused');
        
        $this->app['addpartner.repository']->updateStatus($addpartner);
        
        $this->addflashMessage('Le partner est refuser');
        
        return $this->redirectRoute('admin_addpartners');
    }
}

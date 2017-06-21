<?php

namespace Controller;
use Entity\Partner;

class PagePartnerController extends ControllerAbstract {

    public function partnerAction(){
        $partners = $this->app['partner.repository']->findAll();
        
        return $this->render(
                'partner_list.html.twig',
                ['partners' => $partners]
        );
    }
}

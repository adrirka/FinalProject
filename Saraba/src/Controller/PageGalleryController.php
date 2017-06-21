<?php

namespace Controller;


class PageGalleryController  extends ControllerAbstract {
    
    public function galleryAction(){
        $gallerys = $this->app['gallery.repository']->findAll();
        
        return $this->render(
                'gallery_list.html.twig',
                ['gallerys' => $gallerys]
        );
    }
}
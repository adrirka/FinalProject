<?php

namespace Controller;


class PageActuController extends ControllerAbstract {

    public function actuAction(){
        $articles = $this->app['article.repository']->findAll();
        
        return $this->render(
                'article_list.html.twig',
               ['articles' => $articles]
        );
    }
}

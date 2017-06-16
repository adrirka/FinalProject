<?php

use Controller\IndexController;
use Controller\PartnerController;
use Controller\UserController;
use Controller\Admin\ArticleController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app['index.controller'] = function () use ($app) {
    return new IndexController($app);
};

$app
    ->get('/', 'index.controller:indexAction')  
    ->bind('homepage');

$app['partner.controller'] = function () use ($app) {
    return new PartnerController($app);
};

$app
    ->post('/partenaire/contact', 'partner.controller:formPartnerAjaxAction')
    ->bind('partner_ajax')
;

/* Utilisateur */

$app['user.controller'] = function () use ($app) {
    return new UserController($app);
};

$app
    ->match('utilisateur/inscription', 'user.controller:registerAction')
    ->bind ('register');

$app
    ->match('utilisateur/connexion', 'user.controller:loginAction')
    ->bind ('login');

$app
    ->get('utilisateur/deconnexion', 'user.controller:logoutAction')
    ->bind ('logout');

/* Admin */

// Créer un sous-ensemble de routes
$admin = $app['controllers_factory'];

// permet de faire un traitement avant l'accès à la route
$admin->before(function() use ($app){ 
    if(!$app['user.manager']->isAdmin()){ // si un admin n'est pas connecté
        $app->abort(403, 'Accès refusé'); // HTTP 403 Forbidden
    }
});


// Créer un sous-ensemble de routes
$app->mount('/admin', $admin);



$app['admin.article.controller'] = function () use ($app) {
    return new ArticleController($app);
};

$admin
    ->get('/articles', 'admin.article.controller:listAction')  
    ->bind('admin_articles');

$admin
    ->match('/articles/edition/{id}', 'admin.article.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null) // valeur par défaut (null) pour le paramètre (id) de la route
    ->assert('id', '\d+')
    ->bind('admin_article_edit');

$admin
    ->match('/articles/suppression/{id}', 'admin.article.controller:deleteAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('admin_article_delete');

$app->error(function (Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
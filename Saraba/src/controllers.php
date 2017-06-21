<?php

use Controller\Admin\PartnerController as AdminPartnerController;
use Controller\Admin\AddPartnerController;
use Controller\Admin\GalleryController;
use Controller\IndexController;
use Controller\PagePartnerController;
use Controller\PageGalleryController;
use Controller\PageContactController;
use Controller\PageImplantationsController;
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

$app
    ->post('/home/contact', 'partner.controller:formHomeAjaxAction')
    ->bind('home_ajax')
;

/* Utilisateur */

$app['user.controller'] = function () use ($app) {
    return new UserController($app);
};

//$app
//    ->match('utilisateur/inscription', 'user.controller:registerAction')
//    ->bind ('register');

$app
    ->match('utilisateur/connexion', 'user.controller:loginAction')
    ->bind ('login');

$app
    ->get('utilisateur/deconnexion', 'user.controller:logoutAction')
    ->bind ('logout');

$app
    ->match('/addpartners/edition', 'partner.controller:formAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('addpartner_edit');

$app['pagepartner.controller'] = function () use ($app) {
    return new PagePartnerController($app);
};

$app
    ->match('/pagepartners/edition', 'pagepartner.controller:partnerAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('partner_edit');

$app['pagecontact.controller'] = function () use ($app) {
    return new PageContactController($app);
};

$app
    ->match('/pagecontacts/edition', 'pagecontact.controller:contactAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('contact_edit');


$app['pagegallery.controller'] = function () use ($app) {
    return new PageGalleryController($app);
};

$app
    ->match('/pagegallerys/edition', 'pagegallery.controller:galleryAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('galerie');

$app['pageimplantations.controller'] = function () use ($app) {
    return new PageImplantationsController($app);
};

$app
    ->match('/pageimplantationss/edition', 'pageimplantations.controller:implantationsAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('implantations');




/* Admin */

// Créer un sous-ensemble de routes

$admin = $app['controllers_factory'];

// Permet de faire un traitement avant l'accès à la route

$admin->before(function() use ($app){ 
    if(!$app['user.manager']->isAdmin()){ // si un admin n'est pas connecté
        $app->abort(403, 'Accès refusé'); // HTTP 403 Forbidden
    }
});


// Créer un sous-ensemble de routes
$app->mount('/admin', $admin);

// ADMIN ARTCILE

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
    ->match('/articles/suppression/{id}', 'admin.article.controller:deleteAction')
    ->bind('admin_article_delete');


// ADMIN PARTNER

$app['admin.partner.controller'] = function () use ($app) {
    return new AdminPartnerController($app);
};

$admin
    ->get('/partners', 'admin.partner.controller:listAction')  
    ->bind('admin_partners');

$admin
    ->match('/partners/edition/{id}', 'admin.partner.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null)
    ->assert('id', '\d+')
    ->bind('admin_partner_edit');

$admin
    ->match('/partners/suppression/{id}', 'admin.partner.controller:deleteAction')
    ->bind('admin_partner_delete');


// ADMIN ADDPARTNER

$app['admin.addpartner.controller'] = function () use ($app) {
    return new AddPartnerController($app);
};

$admin
    ->get('/addpartners', 'admin.addpartner.controller:listAction')  
    ->bind('admin_addpartners');

$admin
    ->match('/addpartners/refuse/{id}', 'admin.addpartner.controller:refuseAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->bind('admin_addpartner_refuse');

$admin
    ->match('/addpartners/accepte/{id}', 'admin.addpartner.controller:acceptAction')
    ->bind('admin_addpartner_accepte');


// ADMIN GALLERY

$app['admin.gallery.controller'] = function () use ($app) {
    return new GalleryController($app);
};

$admin
    ->get('/gallerys', 'admin.gallery.controller:listAction')  
    ->bind('admin_gallerys');

$admin
    ->match('/gallerys/edition/{id}', 'admin.gallery.controller:editAction') //match accepte plusieurs méthodes, nomtamment get et post
    ->value('id', null) // valeur par défaut (null) pour le paramètre (id) de la route
    ->assert('id', '\d+')
    ->bind('admin_gallery_edit');

$admin
    ->match('/gallerys/suppression/{id}', 'admin.gallery.controller:deleteAction')
    ->bind('admin_gallery_delete');



// A NE PAS TOUCHER

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
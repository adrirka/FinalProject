<?php

use Repository\AddPartnerRepository;
use Repository\ArticleRepository;
use Repository\PartnerRepository;
use Repository\UserRepository;
use Service\UserManager;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function (Twig_Environment $twig, Application $app) {
    
// pour avoir accès au service UserManager dans les templates
    $twig->addGlobal('user_manager', $app['user.manager']);

    return $twig;
});

$app->register(
    new DoctrineServiceProvider(),
    [
        'db.options' => [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'saraba',
            'user' => 'root',
            'password' => '',
            'charset' => 'utf8',
            
        ]
    ]
);

$app->register(new SessionServiceProvider());
$app->register(new ValidatorServiceProvider());


/* Repository */


$app['article.repository'] = function () use ($app){
    return new ArticleRepository($app['db']);
};

$app['partner.repository'] = function () use ($app){
    return new PartnerRepository($app['db']);
};

$app['addpartner.repository'] = function () use ($app){
    return new AddPartnerRepository($app['db']);
};

$app['user.repository'] = function () use ($app){
    return new UserRepository($app['db']);
};

/* Services */

$app['user.manager'] = function () use ($app){
    return new UserManager($app['session']);
};
return $app;
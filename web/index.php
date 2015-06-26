<?php

require '../vendor/autoload.php';

error_reporting(E_ALL);


use Fw\Components\Routing\RouteParser\YmlParser;
use Fw\Application;
use Fw\Components\Dispatcher\HttpYmlDispatcher;
use Fw\Components\Dispatcher\GenericDispatcher;
use Fw\Components\Routing\RouteParser\GenericParser;
use Fw\Components\View\WebViewTwig;
use Fw\Components\View\JsonView;
use Fw\Components\Database\MyPdo;
use Fw\Components\Container\ServiceYmlContainer;

Twig_Autoloader::register(); // Enable autoloader

//$loader     = new \Twig_Loader_Filesystem(__DIR__."/../web/templates" );
//$twig       = new \Twig_Environment( $loader, array('debug' => false) );
//$twig->addExtension(new Twig_Extension_Debug());

$container=new ServiceYmlContainer(__DIR__."/../src/config/service.yml");
$container->setParameter('app_root',__DIR__);
$container->setParameter('twig_array',array('debug' => false) );
//echo "######<br>";
//var_dump($container->get('YmlParser'));
//echo "######<br>";

$application = new Application();


//$routing=new YmlParser(__DIR__."/../src/config/routing.yml",new GenericParser());


//$dispatcher= new HttpYmlDispatcher(__DIR__."/../src/config/controllers.yml",new GenericDispatcher());
//$webview= new WebViewTwig($twig);
//$jsonview=new JsonView();

##Database

//$db = new \PDO('mysql:dbname=sakila;host=localhost', 'root', 'root');


//$mypdo=new MyPdo($db);

$application->setPathInfo($_SERVER['PATH_INFO']);
$application->setContainer($container);

//$application->setRouting($routing);
//$application->setDispatcher($dispatcher);

//$application->setWebComponent($webview);

//$application->setJsonComponent($jsonview);
//$application->setMypdo($mypdo);


$application->run();


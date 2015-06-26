<?php

if ($_SERVER["ENV"]=="PROD"){
    header('HTTP/1.0 404 Not Found');
    die();

}


require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("html_errors", 1);

use Fw\Components\Routing\RouteParser\YmlParser;
use Fw\Application;
use Fw\Components\Dispatcher\HttpYmlDispatcher;
use Fw\Components\Dispatcher\GenericDispatcher;
use Fw\Components\Routing\RouteParser\GenericParser;
use Fw\Components\View\WebViewTwig;
use Fw\Components\View\JsonView;
use Fw\Components\Database\MyPdo;

Twig_Autoloader::register(); // Enable autoloader

$loader     = new \Twig_Loader_Filesystem(__DIR__."/../web/templates" );
$twig       = new \Twig_Environment( $loader, array('debug' => true) );
$twig->addExtension(new Twig_Extension_Debug());

$application = new Application();


$routing=new YmlParser(__DIR__."/../src/config/routing.yml",new GenericParser());
$dispatcher= new HttpYmlDispatcher(__DIR__."/../src/config/controllers.yml",new GenericDispatcher());
$webview= new WebViewTwig($twig);
$jsonview=new JsonView();

##Database

$db = new \PDO('mysql:dbname=sakila_dev;host=localhost', 'root', 'root');
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

$mypdo=new MyPdo($db);

$application->setPathInfo($_SERVER['PATH_INFO']);
$application->setRouting($routing);
$application->setDispatcher($dispatcher);
$application->setWebComponent($webview);
$application->setJsonComponent($jsonview);
$application->setMypdo($mypdo);
$application->run();


<?php

if ($_SERVER["ENV"]=="PROD"){
    header('HTTP/1.0 404 Not Found');
    die();

}

require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("html_errors", 1);

use Fw\Application;
use Fw\Components\Container\ServiceYmlContainer;

$container=new ServiceYmlContainer(__DIR__."/../src/config/service_dev.yml");
$container->setParameter('app_root',__DIR__);
$container->setParameter('twig_array',array('debug' => true) );

$application = new Application();


$application->setPathInfo($_SERVER['PATH_INFO']);
$application->setContainer($container);


$application->run();

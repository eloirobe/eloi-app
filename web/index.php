<?php

require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);


use Fw\Application;
use Fw\Components\Container\ServiceYmlContainer;

//Twig_Autoloader::register(); // Enable autoloader


$container=new ServiceYmlContainer(__DIR__."/../src/config/service.yml");
$container->setParameter('app_root',__DIR__);
$container->setParameter('twig_array',array('debug' => false) );

$application = new Application();


$application->setPathInfo($_SERVER['PATH_INFO']);
$application->setContainer($container);


$application->run();


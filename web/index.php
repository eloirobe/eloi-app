<?php

require '../vendor/autoload.php';
use Fw\Components\Routing\RouteParser\ymlParser;
use Fw\Application;
use Fw\Components\Routing\RouteParser\jsonParser;

$application = new Application();

$routing=new ymlParser(__DIR__."/../src/config/routing.yml");

$application->setRouting($routing);
$application->run();


$routing=new jsonParser(__DIR__."/../src/config/routing.json");

$application->setRouting($routing);
$application->run();



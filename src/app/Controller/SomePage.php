<?php

namespace App\Controller;

use App\Domain\Country;
use Fw\Components\Container\Container;
use Fw\Components\Controller\Controller;
use Fw\Components\Request\Request;
use Fw\Components\Response\WebResponse;

class SomePage implements Controller{

    private $container;

    function __invoke(Request $request, Container $container)
    {
        $this->container=$container;
        $country=new Country($container);

        if (!empty($request['post'])){
            $country->setElement($request['post']['country']);
        }
        if (empty($request['get'])){
            $offset=0;
        }else{
            $offset=$request['get']['offset'];
        }
        return new WebResponse (array("countries"=>$country->getElements((int)$offset),"count"=>$country->countElements()),"template1.twig");
        //return new JsonResponse(array("countries"=>$country->getElements(0),"count"=>$country->countElements()));
    }


}
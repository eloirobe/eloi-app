<?php
/**
 * Created by PhpStorm.
 * User: Eloi
 * Date: 27/6/15
 * Time: 21:05
 */

namespace App\Controller;


use App\Domain\Country;
use Fw\Components\Container\Container;
use Fw\Components\Controller\Controller;
use Fw\Components\Request\Request;
use Fw\Components\Response\JsonResponse;

class SomeVariablePage  implements Controller{
    function __invoke(Request $request, Container $container)
    {
        $this->container=$container;
        $country=new Country($container);

        if (empty($request['variables'])){
            $offset=0;
        }else{
            $offset=$request['variables']['page'];
        }

        return new JsonResponse(array("countries"=>$country->getElements((int)$offset),"user"=>$request['variables']['variable']));
    }


}
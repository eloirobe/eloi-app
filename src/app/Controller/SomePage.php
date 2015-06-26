<?php

namespace App\Controller;

use Fw\Components\Controller\Controller;
use Fw\Components\Database\Database;
use Fw\Components\Request\Request;
use Fw\Components\Response\JsonResponse;
use Fw\Components\Response\WebResponse;

class SomePage implements Controller{

    function __invoke(Request $request, Database $db)
    {
        var_dump($request);

        $statement=$db->prepare('select * from film;');
        $statement->execute();

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            var_dump($row);

        }


        //return new WebResponse (array("message"=>"Bye earth! Welcome to universe"),"template1.twig");
        return new JsonResponse(array("message"=>"hello world!"));
    }


}
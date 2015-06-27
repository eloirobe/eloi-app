<?php
/**
 * Created by PhpStorm.
 * User: Eloi
 * Date: 27/6/15
 * Time: 21:21
 */

namespace App\Domain;


interface Domain {


    function __construct($container);

    public function getelements($offset);

    public function setelement($name);
}
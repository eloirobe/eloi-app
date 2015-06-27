<?php
/**
 * Created by PhpStorm.
 * User: Eloi
 * Date: 27/6/15
 * Time: 23:03
 */

namespace App\Domain;



class Country {

    private $db;

    private $limit;

    function __construct($container)
    {
        $this->db=$container->get('MyPdo');
        $this->limit=10;
    }

    public function getElements($offset)
    {
        $offset=$offset*$this->limit;
        $statement=$this->db->prepare('select * from country limit :limit offset  :offset;');
        $statement->bindParam(':offset',($offset), \PDO::PARAM_INT);
        $statement->bindParam(':limit',$this->limit, \PDO::PARAM_INT);
        $statement->execute();

       return $statement->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function setElement($name)
    {
        $statement 	= $this->db->prepare('INSERT INTO country (country) VALUES (:country)');
        $statement->bindParam(':country',$name, \PDO::PARAM_STR);

        $statement->execute();
    }

    public function countElements()
    {
        $statement=$this->db->prepare('select count(*) as count from country');
        $statement->execute();
        $row=$statement->fetch(\PDO::FETCH_ASSOC);
        return $row['count']/$this->limit;
    }


}
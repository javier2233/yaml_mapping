<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 4:14 PM
 */

namespace MyApp\Application\Command\Product;


use MyApp\Domain\Owner;

class CreateProductCommand
{
    private $name;
    private $price;
    private $description;
    private $owner;

    public function __construct($name, $price, $description,  $owner)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getOwner()
    {
        return $this->owner;
    }
}
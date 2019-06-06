<?php

namespace MyApp\Domain;

class Product
{

    private $id;
    private $name;
    private $price;
    private $description;
    private $owner;

    public function __construct(string $name, int $price, string $description, Owner $owner)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
    }

    public static function create(string $name, int $price, string $description, Owner $owner):self
    {
        return new self($name, $price, $description, $owner);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getOwner()
    {
        return $this->owner;
    }
    
}
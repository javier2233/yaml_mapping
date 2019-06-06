<?php

namespace MyApp\Domain;


class Owner
{

    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public static function create(string $name):self
    {
        return new self($name);
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

}
<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 5:50 PM
 */

namespace MyApp\Bundle\ProductBundle\Repository;


use Doctrine\ORM\EntityManagerInterface;
use MyApp\Domain\Product;
use MyApp\Domain\Repository\ProductRepository;

class MySQLProductRepository implements ProductRepository
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function save(Product $product):void
    {
        $this->em->persist($product);
        $this->em->flush();
        //print_r($product);exit();

    }
    public  function update (){}
    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
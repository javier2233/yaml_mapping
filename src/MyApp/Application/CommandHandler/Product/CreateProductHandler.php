<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 4:19 PM
 */

namespace MyApp\Application\CommandHandler\Product;


use MyApp\Application\Command\Product\CreateProductCommand;
use MyApp\Domain\Product;
use MyApp\Domain\Repository\ProductRepository;

class CreateProductHandler
{
    private $productRepository;

    public function  __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function  handle (CreateProductCommand $command):Product{
        $product = Product::create($command->getName(), $command->getPrice(), $command->getDescription(), $command->getOwner());
        //print_r($product);exit();
        $this->productRepository->save($product);
        return $product;
    }
}
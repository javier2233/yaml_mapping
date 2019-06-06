<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 9:57 AM
 */

namespace MyApp\Domain\Repository;


use MyApp\Domain\Product;

interface ProductRepository
{
    public function save(Product $product);
    public function update();
    public function delete();
}
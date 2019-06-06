<?php

namespace MyApp\Bundle\ProductBundle;


use Myapp\Bundle\ProductBundle\DependecyInjection\MyAppExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProductBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new MyAppExtension();
    }
}

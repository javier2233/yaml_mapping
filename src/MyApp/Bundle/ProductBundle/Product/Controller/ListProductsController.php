<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProductsController extends Controller
{

    public function execute()
    {
        $handler = $this->get('film.command_handler.all_film');

        try{

            $films = $handler->handle();
            $films = array_map(function(Film $film ){return $film->toArray();},$films);
            return new JsonResponse(['success' =>  'ok', 'films' => $films]);
        }catch (\InvalidArgumentException $e){
            return new JsonResponse(['error' => $e->getMessage() ], 400);
        }
    }
    

}
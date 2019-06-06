<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{

    public function execute($id)
    {
        $id = filter_var($id ?? '', FILTER_SANITIZE_NUMBER_INT);
        $handler = $this->get('film.command_handler.delete_film');

        try{
            $film = $handler->handle($id);
            $this->end();
            return new JsonResponse(['success' =>  'delete ok', 'id_film' => $id]);
        }catch (\Exception $e){
            return new JsonResponse(['error' => $e->getMessage() ], 400);
        }
    }

    private function end(){
        $this->get('doctrine.orm.default_entity_manager')->flush();
    }

}
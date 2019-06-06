<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Application\Command\Product\CreateProductCommand;
use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{

    public function execute(Request $request)
    {

        $jsonReq = json_decode($request->getContent());
        $name = filter_var($jsonReq->name ?? '', FILTER_SANITIZE_STRING);
        $price = filter_var($jsonReq->price ?? '', FILTER_SANITIZE_NUMBER_INT);
        $description = filter_var($jsonReq->description ?? '', FILTER_SANITIZE_STRING);
        $ownerId = filter_var($jsonReq->owner ?? '', FILTER_SANITIZE_NUMBER_INT);
        try{
            $owner = $this->get("owner.command_handler.get_owner")->handle($ownerId);

        }catch (\Exception $e){
            return new JsonResponse(['error' => $e->getMessage() ], 400);
        }
        if($owner){
            $command = new CreateProductCommand($name, $price, $description, $owner);
            $handler = $this->get('product.command_handler.create_product');
            try{
                $product = $handler->handle($command);
                $this->end();
                return new JsonResponse(['success' =>  'create ok', '$film' => $product]);
            }catch (\Exception $e){
                return new JsonResponse(['error' => $e->getMessage() ], 400);
            }

        }

    }

    private function end(){
        $this->get('doctrine.orm.default_entity_manager')->flush();
    }

}
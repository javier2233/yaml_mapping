<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Application\Command\Owner\CreateOwnerCommand;
use MyApp\Component\Product\Domain\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController extends Controller
{

    public function execute(Request $request)
    {

        $name = $request->get("name");
        $command = new CreateOwnerCommand($name);
        $handler = $this->get('owner.command_handler.create_owner');

        try{
            $owner = $handler->handle($command);
            $this->end();
            return new JsonResponse(['success' =>  'create ok', 'Owner' => $name]);
        }catch (\Exception $e){
            return new JsonResponse(['error' => $e->getMessage() ], 400);
        }

    }


    private function end(){
        $this->get('doctrine.orm.default_entity_manager')->flush();
    }

}
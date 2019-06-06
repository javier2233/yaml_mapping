<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductController extends Controller
{

    public function execute(Request $request, $id)
    {

        $jsonReq = json_decode($request->getContent());
        $id = filter_var($jsonReq->id ?? '', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($jsonReq->name ?? '', FILTER_SANITIZE_STRING);
        $description = filter_var($jsonReq->description ?? '', FILTER_SANITIZE_STRING);
        $actorId = filter_var($jsonReq->actor ?? '', FILTER_SANITIZE_NUMBER_INT);
        try{
            $actor = $this->get("actor.command_handler.get_actor")->handle($actorId);

        }catch (\Exception $e){
            return new JsonResponse(['error' => $e->getMessage() ], 400);
        }
        if($actor){
            $command = new UpdateFilmCommand($id, $name, $description, $actor);
            $handler = $this->get("film.command_handler.update_film");
            try{
                $film = $handler->handle($command);
                $this->get("film.film_repository.cached")->deleteCache($id);
                $this->end();
                return new JsonResponse(['success' =>  'update ok', 'film' => $film->toArray()]);
            }catch (\Exception $e){
                return new JsonResponse(['error' => $e->getMessage() ], 400);
            }

        }

    }

    private function end(){
        $this->get('doctrine.orm.default_entity_manager')->flush();
    }

}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBeerRequest;
use App\Http\Services\BeerService;

class BeerController extends Controller
{
    protected $beerService;

    public function __construct(BeerService $beerService)
    {
        $this->beerService = $beerService;
    }

    public function index()
    {
        return response()->json(["asdf" => "asdf"]);
        // $beers = $this->beerService->index();

        // if(!$beers){
        //     return $this->error("Não encontrado", 404);
        // }
        // return response()->json($beers);
    }

    public function getBeerById($id){
        $beer = $this->beerService->getBeerById($id);
        if(!$beer){
            return $this->error("Não encontrado", 404);
        }
        return response()->json($beer);
    }

    public function beerStore(StoreBeerRequest $request)
    {
        $beer = $this->beerService->beerStore($request->all());
        if(!$beer){
            return $this->error('Erro desconhecido, ta dificil, hein? volte a beber que é melhor', 500);
        }
        return response()->json('Cervejinha cadastrada com sucesso');
    }

    public function delete($id)
    {
        $beer = $this->beerService->delete($id);
        if(!$beer){
            return $this->error('Não foi possível deletar', 500);
        }

        return response()->json(['message' => 'deletado com sucesso do sistema, só n deleta a cervejinha da sua vida', 'status' => 200]);
    }

}

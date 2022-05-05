<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Services\ReviewService;
use App\Http\Repositories\BeerRepository;

class ReviewController extends Controller
{
    protected $reviewService;
    protected $beerRepository;

    public function __construct(ReviewService $reviewService, BeerRepository $beerRepository)
    {
        $this->reviewService = $reviewService;
        $this->beerRepository = $beerRepository;
    }

    public function reviewStore(StoreReviewRequest $request, $id)
    {
        $beer = $this->beerRepository->getBeerById($id);
        if(!$beer->first()){
            return $this->error("produto não encontrado", 404);
        }

        $review = $this->reviewService->reviewStore($request->all(), $id);
        if(!$review){
            return $this->error("Você já avaliou esse item", 403);
        }

        return $this->success('Atualizado com sucesso');
    }
}

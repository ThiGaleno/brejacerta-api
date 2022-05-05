<?php

namespace App\Http\Services;

use App\Http\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function reviewStore(array $request, $id)
    {
        $review = $this->reviewRepository->userHasAreadyReviewed($id);

        if(!$review){
            return $this->reviewRepository->reviewStore($request, $id);
        }

        return false;
    }
}

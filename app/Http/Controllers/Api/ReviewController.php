<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
   public function index()
   {
    $reviews = Review::all();

    return response()->json([
        'success' => true,
        'results' => $reviews,
    ]);
   }

   public function store(StoreReviewRequest $request)
    {
        $review = Review::create($request->all());
        
        return response()->json([
            'status' => true,
            'message' => "Product Created successfully!",
            'product' => $review
        ], 200);
    }
}

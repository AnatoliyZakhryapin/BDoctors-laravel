<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $reviews =  Review::where('doctor_id', $data)->get();

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
            'message' => "Review send successfully!",
            'results' => $review
        ], 200);
    }
}

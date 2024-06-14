<?php

namespace App\Http\Controllers;

use App\Models\MovieReview;

class ReviewController extends Controller
{
    public function latestReviews()
    {
        $latestReviews = MovieReview::with('movie', 'user')
            ->latest()
            ->take(5)
            ->get();

        return view('welcome', ['latestReviews' => $latestReviews]);
    }
}

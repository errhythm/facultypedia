<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    // show the reviews of an user (faculty) with pagination of 3
    public function show_faculty($user)
    {
        return view('reviews.index', [
            'reviews' => Reviews::where('user_id', $user)->latest()->paginate(3),
            'user' => $user,
        ]);
    }
}

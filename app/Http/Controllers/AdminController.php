<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // show admin dashboard
    public function index()
    {
        return view('dashboard.index', [
            'heading' => 'Dashboard',
        ]);
    }
    // show all approved reviews
    public function reviews()
    {
        return view('dashboard.reviews.index', [
            'heading' => 'All Reviews',
            'reviews' => Reviews::where('isApproved', 1)->where('isDeleted', 0)->paginate(10),
            'reviewsCount' => Reviews::where('isApproved', 1)->where('isDeleted', 0)->count(),
        ]);
    }

    // show pending reviews
    public function pendingReviews()
    {
        return view('dashboard.reviews.pending', [
            'heading' => 'Pending Reviews',
            // reviews are from reviews model where isApproved and isDeleted is 0 and paginate 10
            'pendingReviews' => Reviews::where('isApproved', 0)->where('isDeleted', 0)->paginate(10),
            'pendingReviewsCount' => Reviews::where('isApproved', 0)->where('isDeleted', 0)->count(),
        ]);
    }

    // approve pending reviews
    public function approveReview($id)
    {
        $review = Reviews::find($id);
        $review->isApproved = 1;
        $review->updated_at = now();
        $review->save();
        return redirect()->back()->with('success', 'Review Approved');
    }

    // delete pending reviews
    public function deleteReview($id)
    {
        $review = Reviews::find($id);
        $review->isDeleted = 1;
        $review->updated_at = now();
        $review->save();
        return redirect()->back()->with('success', 'Review Deleted');
    }
}

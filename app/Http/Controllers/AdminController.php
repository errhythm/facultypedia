<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    // show all users
    public function users()
    {
        return view('dashboard.users.index', [
            'heading' => 'All Users',
            'users' => User::paginate(10),
            'usersCount' => User::count(),
            'unit' => 'user'
        ]);
    }

    // show all faculty
    public function faculties()
    {
        return view('dashboard.users.index', [
            'heading' => 'All Faculties',
            'users' => User::where('role', 'faculty')->paginate(10),
            'usersCount' => User::where('role', 'faculty')->count(),
            'unit' => 'faculty'
        ]);
    }

    // show all students
    public function students()
    {
        return view('dashboard.users.index', [
            'heading' => 'All Students',
            'users' => User::where('role', 'student')->paginate(10),
            'usersCount' => User::where('role', 'student')->count(),
            'unit' => 'student'
        ]);
    }

    // edit a user
    public function editUser($id)
    {
        return view('dashboard.users.edit', [
            'heading' => 'Edit User',
            'user' => User::find($id),
        ]);
    }

    // editUserStore
    public function editUserStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('success', 'User Updated');
    }
}

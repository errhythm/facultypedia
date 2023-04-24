<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reviews;
use App\Models\Faculties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    // show the reviews of an user (faculty) with pagination of 5
    public function show_faculty($user)
    {
        return view('reviews.index', [
            'reviews' => Reviews::where('user_id', $user)->latest()->paginate(5),
            'user' => $user,
        ]);
    }


    // show the reviews of an user (faculty) as api
    public function show_faculty_api($user)
    {
        $faculty = Faculties::where('id', $user)->first();
        return Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->paginate(5);
    }

    // make function to see reviews of a faculty by paginate and load more button where faculty_id = faculties->id and isApproved=1
    public function show_faculty_api_load_more($user, $page)
    {
        $faculty = Faculties::where('user_id', $user)->first();
        return Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->paginate(5, ['*'], 'page', $page);
    }

    // create a new review
    public function store()
    {
        // set user_id to the id of the logged in user
        request()->request->add(['user_id' => auth()->user()->id]);
        // get the data
        $data = request()->all();

        if (!isset($data['isAnonymous'])) {
            $data['isAnonymous'] = 0;
        }

        if ($data['isAnonymous'] == 1) {
            $data['isApproved'] = 0;
        } else {
            $data['isApproved'] = 1;
        }

        if ($data['course_id'] == 0) {
            session()->flash('message', 'You can\'t review a faculty without a course');
            session()->flash('alert-type', 'error');
            return redirect('/profile/' . $data['faculty_id']);
        }

        // check in reviews model already has a review of that faculty and course and is not deleted
        $review_exist = Reviews::where('user_id', $data['user_id'])->where('faculty_id', $data['faculty_id'])->where('course_id', $data['course_id'])->where('isDeleted', 0)->first();
        if ($review_exist) {
            // check if the review is isAnonymous 1 and isApproved 0 and isDeleted 0
            if ($review_exist->isAnonymous == 1 && $review_exist->isApproved == 0) {
                session()->flash('message', 'Your review is under approval. Please wait until you review again.');
                session()->flash('alert-type', 'error');
            }
            // check if the review is isAnonymous 0 and isApproved 1 and isDeleted 0
            if ($review_exist->isAnonymous == 0 && $review_exist->isApproved == 1) {
                session()->flash('message', 'You have already reviewed this faculty for this course.');
                session()->flash('alert-type', 'error');
            }
            return redirect('/profile/' . $data['faculty_id']);
        }

        // create review in database
        $review = Reviews::create($data);
        // if review isApproved 0
        if ($review->isApproved == 0) {
            session()->flash('message', 'As your review is anonymous, your review is pending approval.');
            session()->flash('alert-type', 'warning');
            return redirect('/profile/' . $data['faculty_id']);
        }
        if ($review) {
            session()->flash('message', 'You have successfully reviewed the faculty.');
            session()->flash('alert-type', 'success');
            return redirect('/profile/' . $data['faculty_id']);
        }
    }
}

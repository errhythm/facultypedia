<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Reviews;
use App\Models\Faculties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // show admin dashboard
    public function index()
    {
        $reviews = Reviews::all();
        // if the user logged in is role Admin, the view is dashboard.index
        if (auth()->user()->role == 'admin') {
            $view = 'dashboard.index';
        }
        if (auth()->user()->role == 'faculty') {
            $view = 'dashboard.faculty.index';
        }
        if (auth()->user()->role == 'student') {
            $view = 'dashboard.student.index';
        }


        return view($view, [
            'heading' => 'Dashboard',
            'reviews' => $reviews,
        ]);
    }
    // show all approved reviews
    public function reviews()
    {
        // search reviews
        if (request('rsearch')) {
            $reviews = Reviews::where('isApproved', 1)->where('isDeleted', 0)->where('review', 'like', '%' . request('rsearch') . '%')->paginate(10);
            $reviewsCount = Reviews::where('isApproved', 1)->where('isDeleted', 0)->where('review', 'like', '%' . request('rsearch') . '%')->count();
        } else {
            $reviews = Reviews::where('isApproved', 1)->where('isDeleted', 0)->paginate(10);
            $reviewsCount = Reviews::where('isApproved', 1)->where('isDeleted', 0)->count();
        }
        return view('dashboard.reviews.index', [
            'heading' => 'All Reviews',
            'reviews' => $reviews,
            'reviewsCount' => $reviewsCount,
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
        // search users
        if (request('usearch')) {
            $users = User::where('name', 'like', '%' . request('usearch') . '%')->paginate(10);
            $usersCount = User::where('name', 'like', '%' . request('usearch') . '%')->count();
        } else {
            $users = User::paginate(10);
            $usersCount = User::count();
        }

        return view('dashboard.users.index', [
            'heading' => 'All Users',
            'users' => $users,
            'usersCount' => $usersCount,
            'unit' => 'user'
        ]);
    }

    // show all faculty
    public function faculties()
    {
        // search faculties
        if (request('usearch')) {
            $users = User::where('role', 'faculty')->where('name', 'like', '%' . request('usearch') . '%')->paginate(10);
            $usersCount = User::where('role', 'faculty')->where('name', 'like', '%' . request('usearch') . '%')->count();
        } else {
            $users = User::where('role', 'faculty')->paginate(10);
            $usersCount = User::where('role', 'faculty')->count();
        }

        return view('dashboard.users.index', [
            'heading' => 'All Faculties',
            'users' => $users,
            'usersCount' => $usersCount,
            'unit' => 'faculty'
        ]);
    }

    // show all students
    public function students()
    {
        // search students
        if (request('usearch')) {
            $users = User::where('role', 'student')->where('name', 'like', '%' . request('usearch') . '%')->paginate(10);
            $usersCount = User::where('role', 'student')->where('name', 'like', '%' . request('usearch') . '%')->count();
        } else {
            $users = User::where('role', 'student')->paginate(10);
            $usersCount = User::where('role', 'student')->count();
        }
        return view('dashboard.users.index', [
            'heading' => 'All Students',
            'users' => $users,
            'usersCount' => $usersCount,
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

    // delete a user
    public function deleteUser($id)
    {
        $user = User::find($id);
        // delete the reviews given by the user if there is any
        $reviews = Reviews::where('user_id', $user->id)->get();
        foreach ($reviews as $review) {
            $review->delete();
        }
        if ($user->role == 'faculty') {
            $faculty = Faculties::where('user_id', $user->id)->first();
            $faculty->delete();
        }
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }

    // show all courses
    public function courses()
    {
        // search courses
        if (request('csearch')) {
            // csearch can be course_code or course_title
            $courses = Courses::where('course_code', 'like', '%' . request('csearch') . '%')->orWhere('course_title', 'like', '%' . request('csearch') . '%')->paginate(10);
            $coursesCount = Courses::where('course_code', 'like', '%' . request('csearch') . '%')->orWhere('course_title', 'like', '%' . request('csearch') . '%')->count();
        } else {
            $courses = Courses::paginate(10);
            $coursesCount = Courses::count();
        }
        return view('dashboard.courses.index', [
            'heading' => 'All Courses',
            'courses' => $courses,
            'coursesCount' => $coursesCount,

        ]);
    }

    // add a course POST
    public function addCourse(Request $request)
    {
        // course_code, course_credit, course_title are given by the user
        $request->validate([
            'course_code' => 'required',
            'course_credit' => 'required',
            'course_title' => 'required',
        ]);

        // check if the course already exists
        $course = Courses::where('course_code', $request->course_code)->first();
        if ($course) {
            return redirect()->back()->with('message', 'Course Already Exists');
        }

        // create a new course
        $course = new Courses;
        $course->course_code = $request->course_code;
        $course->course_credit = $request->course_credit;
        $course->course_title = $request->course_title;
        $course->created_at = now();
        $course->updated_at = now();
        $course->save();
        return redirect()->back()->with('message', 'Course Added');
    }

    // edit a course POST
    public function editCourse(Request $request)
    {
        $request->validate([
            'course_code' => 'required',
            'course_credit' => 'required',
            'course_title' => 'required',
        ]);

        $course = Courses::find($request->id);
        $course->course_code = $request->course_code;
        $course->course_credit = $request->course_credit;
        $course->course_title = $request->course_title;
        $course->updated_at = now();
        $course->save();
        return redirect()->back()->with('message', 'Course Updated');
    }
}

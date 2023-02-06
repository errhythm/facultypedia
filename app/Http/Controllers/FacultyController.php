<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\Faculties;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // show all faculties
    public function index($page = 1)
    {
        $total = User::where('role', 'faculty')->count();
        $pageCount = ceil($total / 8);
        $listings = Faculties::latest()->get();
        return view('faculty.index', [
            'total' => $total,
            'page' => $page,
            'page_count' => $pageCount,
            'listings' => $listings,
            'facultyCourses' => \App\Models\Faculties::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // show all faculties
    public function index($page = 1)
    {
        $perPage = 8;
        $total = User::where('role', 'faculty')->count();
        $pageCount = ceil($total / $perPage);
        $listings = User::where('role', 'faculty')->paginate($perPage, ['*'], 'page', $page);
        return view('faculty.index', [
            'total' => $total,
            'page' => $page,
            'page_count' => $pageCount,
            'listings' => $listings,
            'facultyCourses' => \App\Models\Faculties::all(),
        ]);
    }
}

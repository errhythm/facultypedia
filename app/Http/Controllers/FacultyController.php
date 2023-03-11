<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\Faculties;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index($page = 1)
    {
        $total = User::where('role', 'faculty')->count();
        $pageCount = ceil($total / 8);

        return view('faculty.index', [
            'listings' => Faculties::latest()
                ->filter(request(['course', 'search']))
                ->paginate(5),
            'facultyCourses' => \App\Models\Faculties::all(),
        ]);
    }
}

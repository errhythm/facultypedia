<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Courses;
use App\Models\Faculties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    public function index($page = 1)
    {
        $total = User::where('role', 'faculty')->count();

        return view('faculty.index', [
            'listings' => Faculties::latest()
                ->filter(request(['course', 'search']))
                ->paginate(10),
            'facultyCourses' => \App\Models\Faculties::all(),
        ]);
    }

    // view courses page
    public function viewCourses()
    {
        // get the courses of the faculty
        $user = auth()->user();
        $id  = $user->id;
        $faculty = Faculties::find($id);
        $coursestotal = $faculty->courses;
        $coursestotal = explode(',', $coursestotal);
        $courses = Courses::whereIn('id', $coursestotal)->paginate(10);

        // get the rest of the courses that the faculty is not teaching
        $coursesNotTeaching = Courses::whereNotIn('id', $coursestotal)->get();

        $coursesCount = $courses->count();
        return view('dashboard.courses.index', [
            'heading' => 'All Courses',
            'courses' => $courses,
            'coursesCount' => $coursesCount,
            'coursesNotTeaching' => $coursesNotTeaching,
        ]);
    }

    // addCourseStore
    public function addCourseStore(Request $request)
    {
        $user = auth()->user();
        $id  = $user->id;
        $faculty = Faculties::FindOrFail($id);
        $coursestotal = $faculty->courses;
        $coursestotal = explode(',', $coursestotal);
        // remove spaces from each item
        $coursestotal = array_map('trim', $coursestotal);
        $coursestotal[] = $request->course_id;
        $coursestotal = implode(', ', $coursestotal);
        $faculty->courses = $coursestotal;
        $faculty->save();
        return redirect()->back()->with('message', 'Course Added Successfully');
    }

    // removeCourseStore
    public function removeCourseStore(Request $request)
    {
        $user = auth()->user();
        $id  = $user->id;
        $course_remove = $request->id;
        $faculty = Faculties::FindOrFail($id);
        $coursestotal = $faculty->courses;
        $coursestotal = explode(',', $coursestotal);
        $coursestotal = array_map('trim', $coursestotal);
        $key = array_search($course_remove, $coursestotal);
        unset($coursestotal[$key]);
        $coursestotal = array_values($coursestotal);
        $coursestotal = implode(',', $coursestotal);
        $faculty->courses = $coursestotal;
        $faculty->save();
        return redirect()->back()->with('message', 'Course Removed Successfully');
    }
}

<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculties extends Model
{
    use HasFactory;

    public function scopeFilter($courseQuery, array $filters)
    {
        if (isset($filters['course'])) {
            $course_id = Courses::where('course_code', $filters['course'] ?? false)->first();
            if ($course_id) {
                $courseQuery->where('courses', 'like', '%' . $course_id->id . '%');
            } else {
                abort(404);
            }
        }
    }
}

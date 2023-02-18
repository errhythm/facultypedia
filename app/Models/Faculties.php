<?php

namespace App\Models;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculties extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['course'])) {
            $course_id = Courses::where('course_code', $filters['course'] ?? false)->first();
            if ($course_id) {
                $query->where('courses', 'like', '%' . $course_id->id . '%');
            } else {
                abort(404);
            }
        }
        if (isset($filters['search'])) {
            // search in users model, can be multiple users not one
            $search = User::where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('university_id', 'like', '%' . $filters['search'] . '%')
                ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('department', 'like', '%' . $filters['search'] . '%')
                ->get();
            $search_ids = [];
            foreach ($search as $user) {
                $search_ids[] = $user->id;
            }
            $query->whereIn('id', $search_ids);
        }
    }
}

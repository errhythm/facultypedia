<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

    public function courseFilter($course, array $filters)
    {
        dd($filters['course']);
    }
}

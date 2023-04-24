<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;

    // 	id	student_id	slot_id	message	consultation_date	complete_time	meeting_link	is_approved	created_at	updated_at

    protected $fillable = [
        'student_id',
        'faculty_id',
        'slot_id',
        'message',
        'consultation_date',
        'complete_time',
        'meeting_link',
        'is_approved',
    ];
}

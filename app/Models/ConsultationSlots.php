<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationSlots extends Model
{
    use HasFactory;

    protected $fillable = ['faculty_id', 'start_time', 'end_time', 'total_slots', 'day_of_week', 'status'];
}

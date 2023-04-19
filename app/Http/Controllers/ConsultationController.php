<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\ConsultationSlots;

class ConsultationController extends Controller
{
    //
    // create consultation slot page
    public function create()
    {
        return view('dashboard.consultation.create');
    }
}

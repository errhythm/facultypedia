<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function to($email)
    {
        return new \Illuminate\Support\Facades\Mail($email);
    }
}

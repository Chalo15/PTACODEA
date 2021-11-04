<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    function index(){
        return view('coach.coach_interface');
    }
}

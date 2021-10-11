<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Atleta_moduleController extends Controller
{
    function index(){
        return view('users.athlete_module');
    }
}
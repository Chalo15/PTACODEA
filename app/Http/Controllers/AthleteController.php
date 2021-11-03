<?php

namespace App\Http\Controllers;

use App\Models\Sport;

class AthleteController extends Controller
{
    function index(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
    }
}

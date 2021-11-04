<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
    }

    function vistaPracticas(){
    return view('users.instructor');

    }

    function guardarPractica(Request $request){


    }
    function vistaPracticaExtra(){
        return view('users.athlete_data_session');
    }
}

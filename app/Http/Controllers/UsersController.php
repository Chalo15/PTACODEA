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
}

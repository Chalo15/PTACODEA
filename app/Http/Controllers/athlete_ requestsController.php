<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\User;

class athlete_requestsController extends Controller
{
    function index(){
        return view('users.athlete_requests');
    }
    public function attend_request(Request $request){

    }
}
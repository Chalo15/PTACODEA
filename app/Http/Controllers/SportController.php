<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Coach;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class SportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $user = Auth::user()->id;
        $coach = new Coach();
        $coach = Coach::where("user_id", "=", $user)->first();
        $sport = $coach->sport;
        return view('sports.sports', compact('sport'));
    }

    function edit(Request $request, Sport $sport)
    {
        $sport->ckeditor = $request->content;
        $sport->save();
        return redirect()->route('home');
    }



    function view_athletes_sports()
    {
        $user_id = Auth::user()->id;
        $sport_id = new Coach();
        $sport_id = Coach::where("user_id", "=", $user_id)->first();
        $sport = $sport_id->sport_id;

        $athlete = new Athlete();
        $athlete = Athlete::where("sport_id", "=", $sport)->where("state", "=", "a")->get();
        $users = $athlete->map->user->flatten();

        return view('sports.athletes_sport', ['athletes' => $users]);
    }
}

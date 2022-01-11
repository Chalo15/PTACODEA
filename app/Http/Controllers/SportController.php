<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Coach;
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
        return view('home');
    }
}

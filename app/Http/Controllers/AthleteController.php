<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Support\Facades\Auth;

class AthleteController extends Controller
{
    function index(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
    }

    function a_p_d(){
        /*$data = User::select('users.name', 'users.lastname')
                ->join('athletes', 'users.id', '=', 'athletes.user_id')
                ->where("athletes.state", "=", 'a')
                ->get();*/

        Auth::loginUsingId(2);
        $disciplina = Auth::user()->coach->sport;
        $atletas = $disciplina->athletes;
        $verif = $atletas->where("state", "=", 'a');
        $users = $verif->map->user->flatten();
        Auth::logout();


        return view('users.athletesregis',['athletes'=>$users]);

    }
}

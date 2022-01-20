<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\User;
use DB;

class athlete_requestsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    function index(){    
        $atletas = new Athlete;
        $atletas = Athlete::where("state", "=", 'p')->get(); 
        $users = $atletas->map->user->flatten();
        return view('users.athlete_request', ['users'=>$users]);
        
    }
  

    public function destroy($user){
       
        $atleta = New Athlete;
        $atleta = Athlete::where("user_id", "=", $user)->first();
        $atleta->state = 'r';
        $atleta->save();
        return back()->with('succes','Solicitud de registro de atleta denegada correctamente');

        
    }

    public function acceptedAthlete($user){
        $atleta = New Athlete;
        $atleta = Athlete::where("user_id", "=", $user)->first();
        $atleta->state = 'a';
        $atleta->save();
        return back()->with('succes','Solicitud de registro de atleta aprobada correctamente');

        
    } 
}
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
  

    public function destroy(User $request){
        $request->state = 'd';
        $atleta = New Athlete;
        $atleta->state = $request->state;

        return $request->name;

        return back()->with('succes','Solicitud de registro de atleta denegada correctamente');

        $atleta->save();
    }

    public function acceptedAthlete(User $request){
        $request->state = 'a';
        $atleta = New Athlete;
        $atleta->state = $request->state;
        return back()->with('succes','Solicitud de registro de atleta aprobada correctamente');

        $atleta->save();
    } 
}
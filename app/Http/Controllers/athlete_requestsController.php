<?php

namespace App\Http\Controllers;

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
        /*$athleterequests = \DB::table('users')
            ->select('users.identification', 'users.name','users.lastname','users.phone', 'athletes.sport_id')
            ->join('athletes','athletes.user_id',"=",'users.id')
            ->where("athletes.state","=", 'p')
            ->orderBy('identificacion', 'DESC')
            ->get();
        return view('users.athlete_request', ['athleterequests'=>$athleterequests]);  
        dd($athleterequests->all());*/


        $atletas = new Athlete;
        $atletas = Athlete::where("state", "=", 'p')->get(); 
        $users = $atletas->map->user->flatten();
        return view('users.athlete_request', ['users'=>$users]);
        
    }
  

    public function destroy(Request $request){
        $request->delete();
        return back()->with('succes','Solicitud de registro de atleta denegada correctamente');
    }

    public function acceptedAthlete(Request $request){

    } 
}
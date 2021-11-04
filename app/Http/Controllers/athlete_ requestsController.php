<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\User;
use DB;

class athlete_requestsController extends Controller
{
    function index(){
        $athlete_requests = \DB::table('users')
            ->join('athletes','athletes.user_id',"=",'users.id')
            ->select('users.identification', 'users.name','users.lastname','users.phone', 'athletes.sport_id')
            ->where('athletes.state',"p")
            ->orderBy('identificacion', 'DESC')
            ->get();
        return view('users.athlete_requests', ['athlete_requests'=>$athlete_requests]);
    }

    public function destroy(Request $request){
        $request->delete();
        return back()->with('succes','Solicitud de registro de atleta denegada correctamente');
    }

    public function acceptedAthlete(Request $request){

    } 
}
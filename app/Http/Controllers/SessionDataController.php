<?php

namespace App\Http\Controllers;

use App\Models\SessionData;
use Illuminate\Http\Request;

class SessionDataController extends Controller
{

    public function index(){

        return view('users.athlete_data_session');

    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addDataSession(Request $request)
    {

        $rol = 3;

        //validaciones
        $request->validate([

            'tiempo' => 'required',
            'detalleTiempo' => 'required',
            'competicion' => 'required',
            'distancia' => 'required',
            'detalleDistancia' => 'required',
            'tecnica' => 'required',
            'aspectos' => 'required',
            'info' => 'required'
        ]);
        //dd($request->all());
        $user = SessionData::create([
            'user_id'=>1,//pendiente de recibir dato por post
            'tiempo' => $request->tiempo ,
            'detail_time' => $request->detalleTiempo ,
            'competition' => $request->competicion,
            'distance' => $request->distancia,
            'detail_distance' => $request->detalleDistancia,
            'technique' => $request->tecnica,
            'aspects_to_improve' => $request->aspectos,
            'additional_info' => $request->info,
            'level' => $request->nivel,
            'category' => $request->categoria,
            'branch' => $request->rama,
            'max_weight' => $request->peso,
            'detail_max_weight' => $request->detallePeso,
            'battery_test' => $request->prueba
        ]);
    return redirect()->route('practicas')->with('status'/*,['mensaje'=>'Los datos se han registrado correctamente','color'=>'done'] */);//cambiar color


    }

}

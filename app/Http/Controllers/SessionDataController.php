<?php

namespace App\Http\Controllers;

use App\Models\SessionData;
use Illuminate\Http\Request;

class SessionDataController extends Controller
{
    public function addDataSession(Request $request)
    {

        $rol = 3;

        //validaciones
        $request->validate([

            'tiempo' => 'required',
            'competicion' => 'required',
            'distancia' => 'required',
            'tecnica' => 'required',
            'aspectos' => 'required',
            'info' => 'required'
        ]);

        $user = SessionData::create([
            'time' => $request->tiempo + $request->detalleTiempo,
            'competition' => $request->competicion,
            'distance' => $request->distancia + $request->detalleDistancia,
            'technique' => $request->apellidos,
            'aspects_to_improve' => $request->aspectos,
            'additional_info' => $request->info,
            'level' => $request->nivel,
            'category' => $request->categoria,
            'branch' => $request->rama,
            'max_weight' => $request->peso + $request->detallePeso,
            'battery_test' => $request->prueba
        ]);
    return redirect()->route('login')->with('status'/*,['mensaje'=>'Los datos se han registrado correctamente','color'=>'done'] */);//cambiar color


    }
    function index(){
        return view('users.athlete_data_session');
    }
}

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
            'tiempo' => $request->tiempo ,
            'competition' => $request->competicion,
            'distance' => $request->distancia,
            'technique' => $request->apellidos,
            'aspects_to_improve' => $request->aspectos,
            'additional_info' => $request->info,
            'level' => $request->nivel,
            'category' => $request->categoria,
            'branch' => $request->rama,
            'max_weight' => $request->peso,
            'battery_test' => $request->prueba
        ]);
    return redirect()->route('practicas')->with('status'/*,['mensaje'=>'Los datos se han registrado correctamente','color'=>'done'] */);//cambiar color


    }
}

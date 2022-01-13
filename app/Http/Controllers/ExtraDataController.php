<?php

namespace App\Http\Controllers;


use App\Models\Extra_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtraDataController extends Controller
{
    function datos_extra(){
        return view('users.athlete_extra_data');
    }

    public function add_extra_data(Request $request)
    {
        $rol = 3;

        //validaciones
        $request->validate([
            'inicio' => 'required',
            'logros' => 'required',
            'organizacion' => 'required',
            'datos_extra' => 'required',       
        ]);
        

        $extra_data = Extra_data::create([
            'start_date' => $request->inicio,
            'achievements' => $request->logros,
            'other_organization' => $request->organizacion,
            'other_data' => $request->datos_extra,
        
        ]);

        if($request->hasFile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessExtension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessExtension()=="pdf"){
                copy($v_pdf,$url);
                $extra_data->url=$v_nombre;
            }
        }
        $extra_data->save();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Functionary;
use App\Models\User;
use Illuminate\Http\Request;

class FunctionaryController extends Controller
{
    public function guardarFuncionario(Request $request)
    {
        $id_role = 3;

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits:9',
            'department' => 'required',
            'telCelular' => 'required',
            'correo' => 'required|email',
            'password'=>'required',
            'genero'=>'required',
            //datos del funcionario
            'teleHabitacion' => 'required|digits:8',
            'direccion' => 'required',
            'numContrato' => 'required',
            'periodoContrato' =>'required',

        ]);

        $user = User::create([
            'role_id' => 1,
            'name' => $request->nombre,
            'lastname'=>$request->apellidos,
            'identification'=>$request->cedula,
            'password'=>$request->cedula,
            'gender'=>$request->genero,
            'department'=>$request->department,
            'phone'=>$request->telCelular,
            'email'=>$request->email,
            'address'=>$request->direccion,

        ]);

        $functionary = Functionary::create([
            'sport_id' => $request->department,
            'phone' => $request->teleHabitacion,
            'contract_number' => $request->numContrato,
            'contract_period' => $request->periodoContrato,
            'user_id' => $user->id
        ]);

        if($request->hasFile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessExtension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessExtension()=="pdf"){
                copy($v_pdf,$url);

                $functionary->url=$v_nombre;

            }

        }
        $functionary->save();

    }

}

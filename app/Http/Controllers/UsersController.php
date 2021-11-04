<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\User;

class UsersController extends Controller
{
    function index(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
    }

    function vistaFuncionario(){
        return view('users.funcionarios',[
            'sports'=>Sport::all()
        ]);
    }

    public function guardarFuncionario(Request $request)
    {
        $id_role = 3;

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits:9',
            'department' => 'required',
            'teleHabitacion' => 'required',
            'correo' => 'required|email',
            'password'=>'required',
            'genero'=>'required',
            //datos del funcionario
            'telCelular' => 'required|digits:8',
            'direccion' => 'required',
            'numContrato' => 'required',
            'periodoContrato' =>'required',
            'archivo'=>'required'
        ]);

        //Insercion de datos del funcionario a la tabla users
        $User = User::create([
            'role_id' => 2,
            'name' => $request->nombre,
            'lastname'=>$request->apellidos,
            'identification'=>$request->cedula,
            'password'=>$request->password,
            'gender'=>$request->genero,
            //department
            'phone'=>$request->teleHabitacion,
            'email'=>$request->correo,
            'address'=>$request->correo,

        ]);
        /*
        if($request->hasFile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessExtension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessExtension()=="pdf"){
                copy($v_pdf,$url);

                $athlete->url=$v_nombre;

            }

        }
        */
    return redirect()->route('home')->with('status'/*,['mensaje'=>'El atleta se ha registrado correctamente','color'=>'done'] */);//cambiar color
    }

}

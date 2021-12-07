<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    function index(){
        return view('coach.coach_interface');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('instructor',['only'=>['index']]);
    }

    function vistaCoaches(){
        return view('users.coaches',[
            'sports'=>Sport::all()
        ]);
    }
    public function guardarCoach(Request $request)
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
            'role_id' => 2,
            'name' => $request->nombre,
            'lastname'=>$request->apellidos,
            'identification'=>$request->cedula,
            'password'=>$request->cedula,
            'gender'=>$request->genero,
            'phone'=>$request->telCelular,
            'email'=>$request->correo,
            'address'=>$request->direccion,
            'contract_number' => $request->numContrato,
            'contract_year' => $request->periodoContrato,
            'experience'=>$request->experiencia,

        ]);

        $coach = Coach::create([
            'sport_id' => $request->department,
            'phone' => $request->teleHabitacion,
            'user_id' => $user->id
        ]);

        if($request->hasFile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessExtension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessExtension()=="pdf"){
                copy($v_pdf,$url);

                $coach->url=$v_nombre;

            }

        }
        $coach->save();
    return redirect()->route('home')->with('status'/*,['mensaje'=>'El atleta se ha registrado correctamente','color'=>'done']*/ );//cambiar color

    }
}

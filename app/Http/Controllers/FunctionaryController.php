<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Functionary;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\Sport;

class FunctionaryController extends Controller
{
    function vistaFuncionario(){
        return view('users.funcionary',[
            'roles'=>Role::all()
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardarFuncionario(Request $request)
    {
        $id_role = 3;

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits:9',
            'tipo' => 'required',
            'telCelular' => 'required',
            'correo' => 'required|email',
            'password'=>'required|confirmed',
            'genero'=>'required',
            //datos del funcionario
            'teleHabitacion' => 'required|digits:8',
            'direccion' => 'required',
            'numContrato' => 'required',
            'periodoContrato' =>'required',

        ]);

        $user = User::create([
            'role_id' => $request->tipo,
            'name' => $request->nombre,
            'lastname'=>$request->apellidos,
            'identification'=>$request->cedula,
            'password'=>Hash::make($request->cedula),
            'gender'=>$request->genero,
            'phone'=>$request->telCelular,
            'email'=>$request->correo,
            'address'=>$request->direccion,
            'contract_number' => $request->numContrato,
            'contract_year' => $request->periodoContrato,
            'experience'=>$request->experiencia,

        ]);

        $functionary = Functionary::create([
            'phone' => $request->teleHabitacion,
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
    return redirect()->route('home')->with('status'/*,['mensaje'=>'El atleta se ha registrado correctamente','color'=>'done']*/ );//cambiar color

    }

    function list(){
        $athlete = new Athlete;
        $athlete = Athlete::where("state", "=", 'a')->get(); 
        $user = $athlete->map->user->flatten();

        return view('physiotherapy.listAthletes', compact('user'));
    }
    function appointment($id){

        $users = new User;
        $users = User::where("id", "=", $id)->first(); 

        $athletes = new Athlete;
        $athletes = Athlete::where("user_id","=",$users->id)->first();

        $sports = new Sport;
        $sports = Sport::where("id","=",$athletes->sport_id)->first();


        return view('physiotherapy.appointment', compact('users'), compact('sports')); 
    }

    function catalog(){
        $athlete = new Athlete;
        $athlete = Athlete::where("state", "=", 'a')->get(); 
        $user = $athlete->map->user->flatten();

        return view('musculation.catalogAthletes', compact('user'));
    }

    function report(){
        return view('musculation.report');
    }

}

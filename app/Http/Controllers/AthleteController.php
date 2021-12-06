<?php

namespace App\Http\Controllers;
use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AthleteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('atleta',['only'=>['index']]);
    }

    function index(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
        
    }

    function a_p_d(){
        /*$data = User::select('users.name', 'users.lastname')
                ->join('athletes', 'users.id', '=', 'athletes.user_id')
                ->where("athletes.state", "=", 'a')
                ->get();*/

        Auth::loginUsingId(2);
        $disciplina = Auth::user()->coach->sport;
        $atletas = $disciplina->athletes;
        $verif = $atletas->where("state", "=", 'a');
        $users = $verif->map->user->flatten();
        Auth::logout();

        return view('users.athletesregis',['athletes'=>$users]);
    }

    function vistaAtleta(){
        return view('users.athletes',[
            'sports'=>Sport::all()
        ]);
    }

    public function guardado(Request $request)
    {
        $rol = 3;

        //validaciones
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits:9',
            'department' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|digits:8',
            'sangre' => 'required',
            'provincia' => 'required|alpha',
            'canton' => 'required',
            'direccion' => 'required',
            'nombre_encargado' => 'required',
            'apellidos_encargado' => 'required',
            'cedula_encargado' => 'required|digits:9',
            'telefono_encargado' => 'required|digits:8',
            'parentesco' => 'required',
            'poliza'=>'required'
        ]);

        // Inserciones a la tabla Users.
        $user = User::create([
            'role_id' => 3,
            'identification' => $request->cedula,
            'password' => $request->cedula,
            'name' => $request->nombre,
            'lastname' => $request->apellidos,
            'birthdate' => $request->edad,
            'phone' => $request->telefono,
            'email' => $request->correo,
            'province' => $request->provincia,
            'city' => $request->canton,
            'address' => $request->direccion,
            'gender' => $request->genero
        ]);

        $athlete = Athlete::create([
            'user_id' => $user->id,
            'sport_id' => $request->department,
            'name_manager' => $request->nombre_encargado,
            'lastname_manager' => $request->apellidos_encargado,
            'identification_manager' => $request->cedula_encargado,
            'contact_manager' => $request->telefono_encargado,
            'blood' => $request->sangre,
            'state' => 'p',
            'laterality' => 'd',
            'manager' => $request->parentesco,
            'policy' => $request->poliza
        ]);

        if($request->hasFile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessExtension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessExtension()=="pdf"){
                copy($v_pdf,$url);
                $athlete->url=$v_nombre;
            }
        }
        $athlete->save();
    return redirect()->route('login')->with('status'/*,['mensaje'=>'El atleta se ha registrado correctamente','color'=>'done']*/ );//cambiar color
    }

    
}
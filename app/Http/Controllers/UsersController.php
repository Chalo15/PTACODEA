<?php

namespace App\Http\Controllers;



use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class UsersController extends Controller
{
    function index()
    {
        return view('auth.register', [
            'sports' => Sport::all()
        ]);
    }

    public function guardarUsuario(Request $request)
    {
        $id_role = 3;

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'identification' => 'required|digits:9',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'genero' => 'required',
        ]);

        //Insercion de datos del funcionario a la tabla users
        $User = User::create([
            'role_id' => 7,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'password' => Hash::make($request->password),
            'gender' => $request->genero,
            'phone' => $request->phone,
            'email' => $request->email,

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
        return redirect()->route('home')->with('status'/*,['mensaje'=>'El atleta se ha registrado correctamente','color'=>'done'] */); //cambiar color
    }

    function vistaPracticas($atleta)
    {

        $user = Auth::user()->id;
        $coach = new Coach();
        $coach = Coach::where("user_id", "=", $user)->first();
        $sport = $coach->sport;
        $athlete = $atleta;
        return view('users.instructor', compact('sport'), compact('athlete'));
    }

    function guardarPractica(Request $request)
    {
    }
    function vistaPracticaExtra()
    {
        return view('users.athlete_data_session');
    }

    /*function listaAtletas(){
        return view('auth.register');
    }*/
}

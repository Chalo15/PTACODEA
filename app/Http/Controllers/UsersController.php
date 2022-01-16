<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class UsersController extends Controller
{
    function index()
    {
        $users = User::with('role')->paginate(5);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        // Guardar usuario en DB
    }

    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(request $request, user $user)
    {
        // Guardar cambios en DB
    }

    public function guardarusuario(request $request)
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

        //insercion de datos del funcionario a la tabla users
        $user = user::create([
            'role_id' => 7,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'password' => hash::make($request->password),
            'gender' => $request->genero,
            'phone' => $request->phone,
            'email' => $request->email,

        ]);
        /*
        if($request->hasfile("archivo")){

            $v_pdf=$request->file('archivo');
            $v_nombre="pdf_".time().".".$v_pdf->guessextension();
            $url=public_path("storage/".$v_nombre);

            if($v_pdf->guessextension()=="pdf"){
                copy($v_pdf,$url);

                $athlete->url=$v_nombre;

            }

        }
        */
        return redirect()->route('home')->with('status'/*,['mensaje'=>'el atleta se ha registrado correctamente','color'=>'done'] */); //cambiar color
    }

    function vistapracticas($atleta)
    {

        $user = auth::user()->id;
        $coach = new coach();
        $coach = coach::where("user_id", "=", $user)->first();
        $sport = $coach->sport;
        $athlete = $atleta;
        return view('users.instructor', compact('sport', 'athelete'));
    }

    function guardarpractica(request $request)
    {
    }
    function vistapracticaextra()
    {
        return view('users.athlete_data_session');
    }

    /*function listaatletas(){
        return view('auth.register');
    }*/
}

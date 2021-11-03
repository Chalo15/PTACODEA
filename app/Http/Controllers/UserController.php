<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index() {
        return view('auth.register');
    }

    function guardarUser(Request $request){

        // Inserciones a la tabla Users.
        /*$user = User::create([
            'role_id' => 3,
            'identification' => $request->cedula,
            'password' => $request->cedula,
            'name' => $request->name,
            'lastname' => $request->apellidos,
            'phone' => $request->telefono,
            'email' => $request->correo,
            'gender' => $request->genero
        ]);*/

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\User;
use Illuminate\Http\Request;

class guardarAtletaController extends Controller
{
    public function guardado(Request $request)
    {

        //validaciones
        $request->validate([
            'nombre' => 'required',
            'nombre' => 'alpha',
            'apellidos' => 'required',
            'apellidos' => 'alpha',
            'cedula' => 'required|digits:9',
            'department' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|digits:8',
            'sangre' => 'required',
            'provincia' => 'required',
            'provincia' => 'alpha',
            'canton' => 'required',
            'direccion' => 'required',
            'nombre_encargado' => 'required',
            'apellidos_encargado' => 'required',
            'cedula_encargado' => 'required|digits:9',
            'telefono_encargado' => 'required|digits:8',
            'parentesco' => 'required'
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

        // Insercion a la tabla Athletes.
        $athlete = Athlete::create([
            'sport_id' => $request->department,
            'name_manager' => $request->nombre_encargado,
            'lastname_manager' => $request->apellidos_encargado,
            'identification_manager' => $request->cedula_encargado,
            'contact_manager' => $request->telefono_encargado,
            'blood' => $request->sangre,
            'state' => 'p',
            'user_id' => $user->id,
            'laterality' => 'd',
            'coach_id'=>1,
            'manager' => $request->parentesco,
            'policy' => rand(0, 100)
        ]);

       // return view('users.athletes'); //usar cuando es GET
        return redirect()->route('login')->with('status', 'El atleta se ha registrado correctamente'); //Se usa solo cuando es POST

    }
}

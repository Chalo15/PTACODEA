<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\User;
use Illuminate\Http\Request;

class guardarAtletaController extends Controller
{
    public function guardado(Request $request)
    {

        $rol = 3;

        //validaciones 
        $request->validate([

            'nombre' => 'required',
            'nombre' => 'alpha',
            'apellidos' => 'required',
            'apellidos' => 'alpha',
            'cedula' => 'required',
            'department' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'provincia' => 'required',
            'provincia' => 'alpha',
            'canton' => 'required',
            'direccion' => 'required',
            'nombre_encargado' => 'required',
            'apellidos_encargado' => 'required',
            'cedula_encargado' => 'required',
            'telefono_encargado' => 'required',
            'parentesco' => 'required'
        ]);

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
            'sport_id' => $request->department,
            'name_manager' => $request->nombre_encargado,
            'lastname_manager' => $request->apellidos_encargado,
            'identification_manager' => $request->cedula_encargado,
            'contact_manager' => $request->telefono_encargado,
            'manager' => $request->parentesco,
            'state' => 'p',
            'user_id' => $user->id,
            'laterality' => 'd',
            'policy' => rand(0, 100)
        ]);

        // return view('users.athletes'); Siempre que se usa el Get es con view 
        return redirect()->route('login')->with('status', 'El atleta se ha registrado correctamente');

        //Se realiza las inserciones en las columnas de cada tabla con los datos proveneintes del forms de atleta
        /*$v_saveU->name = $request->nombre;
        $v_saveU->lastname = $request->apellidos;
        $v_saveU->identification = $request->cedula;
        $v_saveA->sport_id = $request->department;
        $v_saveU->birthdate = $request->edad;
        $v_saveU->gender = $request-> genero;
        $v_saveU->email = $request->correo;
        $v_saveU->phone = $request->telefono;
        $v_saveU->province = $request->provincia;
        $v_saveU->city = $request->canton;
        $v_saveU->address = $request->direccion;
        $v_saveA->name_manager = $request->nombre_encargado;
        $v_saveA->lastname_manager = $request->apellidos_encargado;
        $v_saveA->identification_manager = $request->cedula_encargado;
        $v_saveA->contact_manager = $request->telefono_encargado;
        $v_saveA->manager = $request->parentesco;
        $v_saveA->state='p';
        $v_saveU->role_id=3;
        $v_saveU->password='123';
        $v_saveU->save();
        $v_saveA->user_id=$v_saveU->id;
        $v_saveA->coach_id=1;
        $v_saveA->laterality='d';
        $v_saveA->policy=111;
       // $v_saveA->identification = $request->archivo;//campo en tabla para meter archivo

    
        $v_saveA->save();*/

        //returnredirect()->route('')

    }
}

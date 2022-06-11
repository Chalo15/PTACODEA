<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Sport;
use App\Models\Role;
use App\Models\User;
use App\Notifications\AppointmentNotification;

use App\Mail\CredentialsMail;
use App\Mail\UpdateCredentialsMail;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware("can:role,'Admin'");
    }



    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $users = User::where('role_id', '!=', 3)->with('role')->get();

        return view('users.index', compact('users'));
    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        $sports = Sport::all();

        $genders = config('general.genders');

        $districts = config('general.districts');

        $conditions = config('general.conditions');

        return view('users.create', compact('roles', 'sports', 'genders', 'districts', 'conditions'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //Envia por correo las credenciales del usuario registrado Id y Password
        $password = $request->password;
        $id = $request->identification;
        $email = $request->email;
        //Sending an email with the password and the identification
        Mail::to($email)->send(new CredentialsMail($id, $password));


        $user = User::create($request->validated());


        if ($request->role_id == 2) {
            $path = $request->file('url')->store('pdfs');

            $user->coach()->create([
                'sport_id' => $request->sport_id,
                'other_phone' => $request->other_phone,
                'url' => $path
            ]);
        }






        return redirect()->route('users.index')->with('status', 'Usuario creado exitosamente!');;
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load(['role', 'physios.athlete.user', 'musculars.athlete.user', 'trainings.athlete.user']);

        return view('users.show', compact('user'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->with('user');

        $roles = Role::all();

        $sports = Sport::all();

        $genders = config('general.genders');

        $districts = config('general.districts');

        $conditions = config('general.conditions');

        return view('users.edit', compact('user', 'roles', 'sports', 'genders', 'districts', 'conditions'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        //Envia por correo las credenciales del usuario registrado Id y Password
        $password = $request->password;
        $id = $request->identification;
        $email = $request->email;
        //Sending an email with the password and the identification
        Mail::to($email)->send(new UpdateCredentialsMail($id, $password));

        return redirect()->route('users.index')->with('status', 'Usuario editado exitosamente!');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $users = User::all();

        if ($user->condition == 'A') {
            $user->update([
                'condition' => 'I'
            ]);
        } else {
            $user->update([
                'condition' => 'A'
            ]);
        }

        return redirect()->route('users.index', ['users' => $users])->with('status', '¡Estado del Usuario Actualizado exitosamente!');
    }
}

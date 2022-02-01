<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Sport;
use App\Models\Role;
use App\Models\User;

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
        $users = User::where('role_id', '!=', 4)->with('role')->get();

        return view('users.index', compact('users'));
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

        $provinces = config('general.provinces');

        return view('users.create', compact('roles', 'sports', 'genders', 'provinces'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        if ($request->role_id == 2) {
            $path = $request->file('pdf')->store('pdfs');

            $user->coach()->create([
                'sport_id' => $request->sport_id,
                'phone' => $request->other_phone,
                'url' => $path
            ]);
        }

        return redirect()->route('users.index');
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

        $provinces = config('general.provinces');

        return view('users.edit', compact('user', 'roles', 'sports', 'genders', 'provinces'));
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

        return redirect()->route('users.index')->with('status', 'Usuario editado exitosamente!');
    }
}

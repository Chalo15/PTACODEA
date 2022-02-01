<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use App\Models\Athlete;
use App\Models\Sport;
use App\Models\User;
use App\Models\Coach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AthletesController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Determinar según por rol cuales atletas retornar.
        $rol = Auth::user()->role->description;
        if ($rol == "Admin" || $rol == "Musculacion" || $rol == "Fisioterapia") {
            $athletes = Athlete::with('user')->get();

            return view('athletes.index', compact('athletes'));
        }

        if ($rol == "Instructor") {

            $sport_id = Auth::user()->coach->sport_id;
            $athletes = Athlete::where("sport_id", "=", $sport_id)->get();

            return view('athletes.index', ['athletes' => $athletes]);
        }
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();

        $coaches = Coach::with('user')->get();

        $users = User::where('role_id', '=', 7)->get();

        $genders = config('general.genders');

        $provinces = config('general.provinces');

        $bloods = config('general.bloods');

        $lateralities = config('general.lateralities');

        $relationships = config('general.relationships');

        return view('athletes.create', compact('sports', 'users', 'genders', 'provinces', 'bloods', 'lateralities', 'relationships', 'coaches'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreAthleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAthleteRequest $request)
    {
        $user = $request->is_user ? User::findOrFail($request->user_id) : User::create($request->validated() + ['role_id' => 7]);


        $user->athlete()->create($request->validated() + ['state' => 'A', 'sport_id' => Coach::find($request->coach_id)->sport_id]);

        $user->update([
            'role_id' => 4
        ]);

        // Almacenaje de la imagen.

        return redirect()->route('athletes.index')->with('status', '¡Atleta creado exitosamente!');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        $athlete->with('user', 'physios', 'trainings', 'musculars');

        return view('athletes.show', compact('athlete'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        $athlete->with('user');

        $coaches = Coach::all();

        $sports = Sport::all();

        $genders = config('general.genders');

        $provinces = config('general.provinces');

        $bloods = config('general.bloods');

        $lateralities = config('general.lateralities');

        $relationships = config('general.relationships');

        return view('athletes.edit', compact('sports', 'athlete', 'genders', 'provinces', 'bloods', 'lateralities', 'relationships', 'coaches'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAthleteRequest $request, Athlete $athlete)
    {
        $athlete->update($request->validated() + ['sport_id' => Coach::find($request->coach_id)->sport_id]);

        $athlete->user->update($request->validated());

        return redirect()->route('athletes.index')->with('status', 'Atleta editado exitosamente!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAthleteRequest;
use App\Models\Athlete;
use App\Models\Sport;
use App\Models\User;
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
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Determinar según por rol cuales atletas retornar.
        $rol = Auth::user()->role->description;
        if($rol == "Admin"){
            $athletes = Athlete::with('user')->paginate(5);

            return view('athletes.index', compact('athletes'));
        }

        if($rol == "Instructor"){
            
            $sport_id = Auth::user()->coach->sport_id;

            $athletes = new Athlete();
            $athletes = Athlete::where("sport_id", "=", $sport_id)->paginate(5);

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

        $users = User::where('role_id', '=', 7)->get();

        return view('athletes.create', compact('sports', 'users'));
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

        $user->athlete()->create($request->validated() + ['state' => 'A']);

        $user->update([
            'role_id' => 4
        ]);

        // Almacenaje de la imagen.

        return redirect()->route('athletes.index')->with('status', '¡Atleta creado exitosamente!');
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

        return view('athletes.edit', compact('athlete'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\AthletesExport;
use App\Http\Requests\StoreAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use App\Models\Athlete;
use App\Models\Sport;
use App\Models\User;
use App\Models\Coach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Mail\CredentialsMail;
use App\Mail\UpdateCredentialsMail;

use Illuminate\Support\Facades\Mail;

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

        $this->middleware("can:role,'Admin', 'Musculacion', 'Fisioterapia', 'Instructor', 'Atleta'");
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
        $user = request()->user();

        if ($user->hasRole(['Admin'])) {
            $athletes = Athlete::with('user')->get();

            return view('athletes.index', compact('athletes'));
        }

        if ($user->hasRole(['Musculacion']) || $user->hasRole(['Fisioterapia'])) {
            $athletes = Athlete::where("state", "=", 'A')->with('user')->get();

            return view('athletes.index', compact('athletes'));
        }

        if ($user->hasRole(['Instructor'])) {

            $sport_id = Auth::user()->coach->sport_id;
            $athletes = Athlete::where("sport_id", "=", $sport_id)->where("state", "=", 'A')->with('user')->get();

            return view('athletes.index', ['athletes' => $athletes]);
        }
    }

    public function export()
    {
        return Excel::download(new AthletesExport, 'athletes.xlsx');
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

        $genders = config('general.genders');

        $districts = config('general.districts');

        $bloods = config('general.bloods');

        $categories = config('general.categories');

        $lateralities = config('general.lateralities');

        $relationships = config('general.relationships');

        return view('athletes.create', compact('sports', 'users', 'genders', 'districts', 'bloods', 'lateralities', 'categories', 'relationships'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreAthleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAthleteRequest $request)
    {
        //Envia las credenciales por correo del athleta registrado, Id y Password
        $id = $request->identification;
        $password = $request->password;
        $email = $request->email;
        //Sending an email with the password and the identification
        Mail::to($email)->send(new CredentialsMail($id, $password));


        $user = User::create($request->validated() + ['role_id' => 3]);


        $user->athlete()->create($request->validated() + ['state' => 'A']);

        $user->update([
            'role_id' => 3
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
        $user = request()->user();

        if ($user->hasRole(['Atleta'])) {

            if ($athlete->id != $user->athlete->id) {

                return view('home');
            }
            $athlete->with('user', 'physios', 'trainings', 'musculars');

            return view('athletes.show', compact('athlete'));
        }

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

        $states = config('general.states');

        $genders = config('general.genders');

        $districts = config('general.districts');

        $categories = config('general.categories');

        $bloods = config('general.bloods');

        $lateralities = config('general.lateralities');

        $relationships = config('general.relationships');


        return view('athletes.edit', compact('states', 'sports', 'athlete', 'genders', 'districts', 'bloods', 'lateralities', 'categories', 'relationships', 'coaches'));
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



        $athlete->update($request->validated());

        $athlete->user->update($request->validated());

        //Envia las credenciales por correo del athleta registrado, Id y Password
        $id = $request->identification;
        $password = $request->password;
        $email = $request->email;
        //Sending an email with the password and the identification
        Mail::to($email)->send(new UpdateCredentialsMail($id, $password));



        return redirect()->route('athletes.index')->with('status', 'Atleta editado exitosamente!');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        $athletes = Athlete::with('user')->get();

        if ($athlete->state == 'A') {
            $athlete->update([
                'state' => 'R'
            ]);
        } else {
            $athlete->update([
                'state' => 'A'
            ]);
        }

        return redirect()->route('athletes.index', ['athletes' => $athletes])->with('status', '¡Estado del Atleta Actualizado exitosamente!');
    }
}

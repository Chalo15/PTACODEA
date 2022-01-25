<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuscularsRequest;
use App\Models\Athlete;
use App\Models\Muscular;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MuscularsController extends Controller
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
        $role = Auth::user()->role->description;
        $user = Auth::user()->id;


        if ($role == "Admin") {
            $muscular = Muscular::with('user')->paginate(5);
            return view('musculars.index', compact('muscular'));
        } else {

            $muscular = new Muscular();
            $muscular = Muscular::where('user_id', '=', $user)->paginate(5);
            return view('musculars.index', compact('muscular'));
        }
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muscular = Muscular::with('user')->paginate(5);
        $users = User::where('role_id', '=', 4)->get();
        return view('musculars.create', compact('muscular','users'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreMuscularsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMuscularsRequest $request)
    {
        $user = $request->is_user ? Athlete::findOrFail($request->user_id) : Muscular::create($request->validated());
        //$identification = $user->athlete()->id;
        //$user->musculars()->create($request->validated());

        /*$user->update([
            'athlete_id' => $identification
        ]);*/
        return redirect()->route('musculars.index')->with('status', 'Registro creado exitosamente!');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function show(Muscular $muscular)
    {
        //
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function edit(Muscular $muscular)
    {
        //
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muscular $muscular)
    {
        //
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muscular $muscular)
    {
        //
    }
}

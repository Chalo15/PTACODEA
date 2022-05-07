<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Athlete;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class TrainingsController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware("can:role,'Admin','Instructor'");
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();

        $trainings = $user->role->description == 'Admin' ?
            Training::with('user', 'athlete.user', 'athlete.sport','coach.user')->get() :
            $user->trainings->load('user', 'athlete.user', 'athlete.sport','coach.user');

        return view('trainings.index', compact('trainings'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $athletes = Athlete::where("state", "=", 'A')->with('user')->get();

        return view('trainings.create', compact('athletes'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingRequest $request)
    {
        $user = $request->user();

        $user->trainings()->create($request->validated());

        return redirect()->route('trainings.index')->with('status', 'Documento creado exitosamente!');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $training->with('athlete');

        return view('trainings.edit', compact('training'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->validated());

        return redirect()->route('trainings.index')->with('status', 'Documento editado exitosamente!');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }

    /**
     * Generacion de pdf de Entrenadores.
     *
     * @param  \App\Models\Training  $physio
     */
    public function generatePDF(Training $training)
    {
        $pdf = PDF::loadView('pdfs.training', compact('training'));

        //return $pdf->download('document.pdf');

        return $pdf->download($training->athlete->user->full_name . '.pdf');

    }



    public function generateReport(Training $training)
    {
        $user = request()->user();
        $id=$training->user_id;
        //dd($id);
      
        if ($user->hasRole(['Instructor'])) {
            

            $data = Training::with('user', 'athlete.user', 'athlete.sport')->where("user_id", "=",$user->id)->get();

            $pdf=PDF::loadView('pdfs.reportTraining',compact('data'));
            return $pdf->download('Reporte.pdf');
        }

        if($user->hasRole(['Admin'])){

            
            $data = Training::with('user', 'athlete.user', 'athlete.sport')->where("user_id", "=",$id)->get();

            $pdf=PDF::loadView('pdfs.reportTraining',compact('data'));
            return $pdf->download('Reporte.pdf');

        }
        
       

    }
}

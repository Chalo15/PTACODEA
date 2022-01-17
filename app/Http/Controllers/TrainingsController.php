<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

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
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
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
}

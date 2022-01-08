@extends('layouts.app')

@section('content')
<body class="athlete_data_session">

    @if(session('status'))
    <div class="alert alert-{{ session('status')['color'] }} alert-dismissible fade show" role="alert">
        {{ session('status')['mensaje'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="container py-4">

        <div class="row justify-content-center ">

            <div class="col-md-8">

                <div class="card">

                    <div class="text-center card-header">
                        <h3 class="d-5">Formulario de registro de datos de sesiones de entrenamiento para disciplinas</h3>
                    </div>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 ">
            <h1 class="display-5 text-center">Menu Principal</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="mi_perfil">
                <h3>Mi Perfil</h3>
                <i class=" d-block fas fa-user p-2"></i>
                <button class="btn btn-primary">Ingresar</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="gimnasio">
                <h3>Gimnasio</h3>
                <i class=" d-block fas fa-dumbbell p-2"></i>
                <button class="btn btn-primary">Ingresar</button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="atleta_registro">
                <h3>Registro de la Disciplina Deportiva</h3>
                <i class="d-block fas fa-running p-2"></i>
                <button class="btn btn-primary">Ingresar</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="fisioterapia_clinica">
                <h3>Clinica de Fisioterapia</h3>
                <i class="d-block fas fa-user-md p-2"></i>
                <button class="btn btn-primary">Ingresar</button>
            </div>

        </div>
    </div>
</div>
@endsection

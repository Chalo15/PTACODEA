@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" col-sm-12 col-md-6 col-lg-6 ">
            <h2 class="display-5 text-center">Menu Principal</h2>
        </div>
    </div>
    <div class="row justify-content-center p-1">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <div class="user-icon d-block"><i class="fas fa-user p-2"></i></div>
                <button class="btn btn-negro">Ingresar</button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="gimnasio">
                <h4 class="">Gimnasio</h4>
                <i class=" d-block fas fa-dumbbell p-2"></i>
                <button class="btn btn-negro">Ingresar</button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center p-1">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="atleta_registro">
                <h4 class="">Analizar Solicitud</h4>
                <i class="d-block fas fa-running p-2"></i>
                <button class="btn btn-negro">Ingresar</button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center">
            <div class="fisioterapia_clinica">
                <h4 class="">Fisioterapia</h4>
                <i class="d-block fas fa-user-md p-2"></i>
                <button class="btn btn-negro">Ingresar</button>
            </div>

        </div>
    </div>
</div>
@endsection

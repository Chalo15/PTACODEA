@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="">
            <h1 class="display-5 text-center">Menu Principal</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <h3>Mi Perfil</h3>
            <img class="rounded mx-auto d-block m-2" src="https://cdn-icons-png.flaticon.com/512/1361/1361728.png" alt="" width="150vh">
            <button class="btn btn-primary">Ingresar</button>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <h3>Gimnasio</h3>
            <img class="rounded mx-auto d-block m-2" src="https://cdn-icons-png.flaticon.com/512/69/69840.png" alt="" width="150vw">
            <button class="btn btn-primary">Ingresar</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <h3>Registro de la Disciplina Deportiva</h3>
            <button class="btn btn-primary">Ingresar</button>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 text-center aligne-item-center">
            <h3>Clinica de Fisioterapia</h3>
            <i class="d-block fas fa-user-md"></i>
            <button class="btn btn-primary">Ingresar</button>

        </div>
    </div>
</div>
@endsection

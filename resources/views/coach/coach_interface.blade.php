@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" col-sm-12 col-md-6 col-lg-6 ">
            <h2 class="display-5 text-center">Menú de Instructor</h2>
        </div>
    </div>
    <div class="row justify-content-center p-5">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center p-2">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <div class="user-icon d-block"><i class="fas fa-user p-2"></i></div>
                <button class="btn btn-negro">Ingresar</button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center p-2">
            <div class="reservar_gimnasio">
                <h4 class="">Reservar Instalaciones</h4>
                <i class=" d-block fas fa-book p-2"></i>
                <button class="btn btn-negro">Ingresar</button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-center aligne-item-center ">
            <div class="registro_de_datos_atleta">
                <h4 class="">Registrar datos del atleta</h4>
                <i class="d-block fas fa-address-card p-2"></i>
                <a href="/users/athlete_data_session"  class="btn btn-negro">Ingresar</a>
                
            </div>
        </div>
    </div>
   
</div>

@endsection


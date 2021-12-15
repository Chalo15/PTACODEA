
@extends('layouts.app')

@section('content')
@if(session('status'))
<div class="alert alert-{{ session('status')['color'] }} alert-dismissible fade show" role="alert">
    {{ session('status')['mensaje'] }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">

      <div class="text-center card-header">
        <h3 class="d-5">Datos extra del atleta</h3>
      </div> 

      <div class="card-body">
        <form class="well form-horizontal" action="{{route('add_extra_data')}} " method="post"  id="formulario_registro" enctype="multipart/form-data">
              <!-- Título del formulario -->
                @csrf

                <!-- Fecha de inicio en su disciplina -->
                <x-row>
                  <x-input name="inicio" placeholder="Fecha de inicio en su disciplina" label="Fecha de inicio en su disciplina" type="date"/>
                </x-row>

                <!-- Logros históricos -->
                <div class="form-group row">
                 <label class="col-md-4 col-form-label text-md-right">Logros previos en la disciplina.</label>
                 <div class="col-md-7">
                  <textarea placeholder="Escriba sus logros personales o de equipo" name="logros" id="" cols="48" rows="3" value="{{ old('logros') }}"></textarea>
                 </div>
                </div>

                <!-- Proviene de otra organización-->
                <div class="form-group row">
                 <label class="col-md-4 col-form-label text-md-right">¿Proviene de otra organización?</label>
                 <div class="col-md-7">
                  <textarea placeholder="Escriba de dónde proviene y cuánto tiempo perteneció a ésta" name="organizacion" id="" cols="48" rows="3" value="{{ old('organizacion') }}"></textarea>
                 </div>
                </div>

                <!-- Datos personales que desea agregar -->
                <div class="form-group row">
                 <label class="col-md-4 col-form-label text-md-right">Otros datos personales que considera importantes</label>
                 <div class="col-md-7">
                  <textarea placeholder="Escriba otros datos importantes sobre usted" name="datos_extra" id="" cols="48" rows="3" value="{{ old('datos_extra') }}"></textarea>
                </div>
                </div>
            
                        <!-- Enviar y PDF -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Espacio para adjuntar sus rutinas personales</label>  
                            <div class="card">
                            <div class="card-body">
                            <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                                        <input type="file" class="offset-md-0  form-control-file" name="archivo" id="pdf" value="{{ old('archivo') }}">
                                        <small id="pfd" class="text-muted">
                                            Adjuntar rutina de ejercicios en formato pdf.
                                    </div>
                                </div>
                                </div>
                                </div>
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-negro">Añadir</button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
     
        </div>

    </div>

</div>
@endsection

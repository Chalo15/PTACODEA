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
        <h3 class="d-5">Formulario de registro de datos de sesiones de entrenamiento para disciplinas</h3>
      </div>

      <div class="card-body">
        <form class="well form-horizontal" action="{{route('athletes_index')}} " method="post"  id="form_reg_session_data" enctype="multipart/form-data">
              <!-- Título del formulario -->
                @csrf


                <!-- Tiempo -->
                <x-row>
                      <x-input name="tiempo" placeholder="Tiempo" label="Tiempo"/>
                      <select name="detalleTiempo" placeholder="Tiempo" class="form-control" type="text" value= "{{ old('detalleTiempo') }}">
                        <option value="0">Seleccione la medida</option>
                            <option value=" Seg">Segundos</option>
                            <option value=" Min">Minutos</option>
                            <option value=" Hrs">Horas</option>
                        </select>
                </x-row>

                <!-- Competicion -->
                <x-row>
                  <x-input name="competicion" placeholder="Compencia" label="Competencia"/>
                </x-row>

                <!-- Distancia Max Alcanzada -->

                <x-row>
                  <x-input name="distancia" placeholder="Distancia maxima alcanzada" label="Distancia maxima alcanzada"/>
                  <select name="detalleDistancia" placeholder="Distancia Maxima" class="form-control" type="text" value= "{{ old('detalleDistancia') }}">
                    <option value="0">Seleccione la medida</option>
                        <option value=" Metros">Metros</option>
                        <option value=" Kilometros">Kilometros</option>
                        <option value=" Yardas">Yardas</option>
                  </select>
                </x-row>

                <!-- Tecnica -->
                <x-row>
                  <x-input name="tecnica" placeholder="Tecnica" label="Tecnica"/>
                </x-row>

                <!-- Aspectos a Mejorar -->
                <x-row>
                    <x-input name="aspectos" placeholder="Aspectos a Mejorar" label="Aspectos a Mejorar"/>
                  </x-row>

                  <!-- Informacion Adicional de la sesion -->
                <x-row>
                    <x-input name="info" placeholder="Informacion adicional" label="Informacion adicional"/>
                  </x-row>

                  <!-- Nivel -->
                <x-row>
                    <x-input name="nivel" placeholder="Nivel" label="Nivel"/>
                  </x-row>

                  <!-- Categoria -->
                <x-row>
                    <x-input name="categoria" placeholder="Categoria" label="Categoria"/>
                  </x-row>

                  <!-- Rama -->
                <x-row>
                    <x-input name="rama" placeholder="Rama" label="Rama"/>
                  </x-row>


                  <!-- Levantamiento maximo de peso -->
                <x-row>
                    <x-input name="peso" placeholder="Peso maximo" label="Levantamiento maximo de Peso">
                        <select name="detallePeso" placeholder="Peso Maximo" class="form-control" type="text" value= "{{ old('detallePeso') }}">
                            <option value="0">Seleccione la medida</option>
                                <option value=" Kg">Kilogramos</option>
                                <option value=" Lb">Libras</option>
                            </select>
                        </x-input>
                </x-row>


                  <!-- Prueba de Bateria -->
                <x-row>
                    <x-input name="prueba" placeholder="Prueba" label="Prueba de bateria"/>
                  </x-row>


                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"></label>
                  <div class="col-md-7">
                    <button type="submit" class="btn btn-negro" >Registrar</button>
                  </div>
                </div>

          </form>
      </div>

      </div>

    </div>

  </div>


</div>
@endsection

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
        <form class="well form-horizontal" action="{{route('athletes.add')}} " method="post"  id="form_reg_session_data" enctype="multipart/form-data">
              <!-- Título del formulario -->
                @csrf


                <!-- Tiempo -->
                <x-row>
                      <x-input name="tiempo" placeholder="Tiempo" label="Tiempo"/>
                      <label class="col-md-4 col-form-label text-md-right">Seleccione la unidad de medida del tiempo</label>
                      <div class="col-md-3 selectContainer">
                      <select name="detalleTiempo" class="form-control" value= "{{ old('detalleTiempo') }}">
                            <option value=" Seg">Segundos</option>
                            <option value=" Min">Minutos</option>
                            <option value=" Hrs">Horas</option>
                      </select>
                    </div>
                </x-row>

                <!-- Competicion -->
                <x-row>
                  <x-input name="competicion" placeholder="Compencia" label="Competencia"/>
                </x-row>

                <!-- Distancia Max Alcanzada -->

                <x-row>
                  <x-input name="distancia" placeholder="Distancia maxima alcanzada" label="Distancia maxima alcanzada"/>
                  <label class="col-md-4 col-form-label text-md-right">Seleccione la unidad de medida de la Distancia</label>
                      <div class="col-md-3 selectContainer">
                  <select name="detalleDistancia" class="form-control" value= "{{ old('detalleDistancia') }}" >
                        <option value=" Metros">Metros</option>
                        <option value=" Kilometros">Kilometros</option>
                        <option value=" Yardas">Yardas</option>
                  </select>
                </div>
                </x-row>

                <!-- Tecnica -->
                <x-row>
                  <x-input name="tecnica" placeholder="Tecnica" label="Tecnica"/>
                </x-row>

                <!-- Aspectos a Mejorar -->
                <x-row>
                    <label class="col-md-4 col-form-label text-md-right">Aspectos a mejorar</label>
                      <div class="col-md-3 selectContainer">
                    <textarea placeholder="Aspectos a mejorar" name="aspectos" cols="44" rows="5" value= "{{ old('aspectos') }}"></textarea>
                      </div>
                </x-row>

                  <!-- Informacion Adicional de la sesion -->
                  <x-row>
                    <label class="col-md-4 col-form-label text-md-right">Información Adicional de la sesión</label>
                      <div class="col-md-3 selectContainer">
                    <textarea placeholder="Informacion adicional" name="info" cols="44" rows="5" value= "{{ old('info') }}"></textarea>
                      </div>
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
                    <x-input name="peso" placeholder="Peso maximo" label="Levantamiento maximo de Peso"/>
                        <label class="col-md-4 col-form-label text-md-right">Seleccione la Unidad de medida del Peso</label>
                      <div class="col-md-3 selectContainer">
                        <select name="detallePeso" class="form-control">
                                <option value="Kg">Kilogramos</option>
                                <option value="Lb">Libras</option>
                            </select>
                    </div>
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

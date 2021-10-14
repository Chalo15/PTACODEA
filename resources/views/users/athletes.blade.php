@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">

      <div class="text-center card-header">
        <h3 class="d-5">Formulario de registro del atleta</h3>
      </div>

      <div class="card-body">
        <form class="well form-horizontal" action="{{route('athletes.guardado')}} " method="post"  id="formulario_registro" enctype="multipart/form-data">
              <!-- Tíitulo del formulario -->
                @csrf

              
                <!-- Nombre -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-7">
                    <input  name="nombre" placeholder="Nombre" class="form-control"  type="text" value= "{{ old('nombre') }}">
                  </div>
                </div>

                <!-- Apellidos -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Apellidos</label>
                  <div class="col-md-7">
                    <input name="apellidos" placeholder="Apellidos" class="form-control"  type="text" value= "{{ old('apellidos') }}">
                  </div>
                </div>

                <!-- Cedula -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Cédula</label>
                  <div class="col-md-7">
                    <input  name="cedula" pattern="[0-9]{9}" placeholder="Cédula" class="form-control"  type="number"value= "{{ old('cedula') }}" >
                  </div>
                </div>

                <!-- Disciplina -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right ">Disciplina</label>
                  <div class="col-md-5 ">
                    <select name="department" class="form-control selectpicker" value= "{{ old('department') }}">
                      @foreach ($sports as $sport)
                      <option value="{{$sport->id}}">
                      {{$sport->description}}</option>

                      @endforeach
                    
                    </select>
                  </div>
                </div>

                <!-- Edad -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Edad</label>
                  <div class="col-md-5">
                  <input name="edad" placeholder="Edad" class="form-control" type="date"value= "{{ old('edad') }}"></div>
                </div>

                <!-- Género -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Género</label>
                  <div class="col-md-7">
                    <div class="checkbox"><label><input type="radio" name="genero" value="f" /> Femenino</label></div>
                    <div class="checkbox"><label><input type="radio" name="genero" value="m" /> Masculino</label></div>
                    <div class="checkbox"><label><input type="radio" name="genero" value="n" /> Otro</label></div>
                  </div>
                </div>

                <!-- Correo -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Correo electrónico</label>
                  <div class="col-md-7">
                    <input name="correo" placeholder="E-mail" class="form-control"  type="email"value= "{{ old('correo') }}">
                  </div>
                </div>

                <!-- Teléfono -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"> N° Teléfono</label>
                    <div class="col-md-5">
                    <input name="telefono" pattern="[0-9]{8}" placeholder="(+506)88888888" class="form-control" type="number"  value= "{{ old('telefono') }}">
                  </div>
                </div>
                <!-- Sangre -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" >Tipo de Sangre</label>
                    <div class="col-md-3 selectContainer">
                    <select name="sangre" placeholder="Tipo Sangre" class="form-control" type="text" value= "{{ old('sangre') }}">
                        <option value="0">Seleccione su Tipo de Sangre</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <!-- Provincia -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Provincia</label>
                  <div class="col-md-3 selectContainer">
                    <select name="provincia" placeholder="Provincia" class="form-control" type="text" value= "{{ old('provincia') }}">
                        <option value="0">Seleccione su Provincia</option>
                            <option value="SanJose">SanJose</option>
                            <option value="Alajuela">Alajuela</option>
                            <option value="Cartago">Cartago</option>
                            <option value="Heredia">Heredia</option>
                            <option value="Guanacaste">Guanacaste</option>
                            <option value="Puntarenas">Puntarenas</option>
                            <option value="Limon">Limon</option>
                      </select>
                    </div>
                </div>

                <!-- Cantón -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Cantón</label>
                  <div class="col-md-7">
                    <input name="canton" placeholder="Cantón" class="form-control"  type="text" value= "{{ old('canton') }}">
                  </div>
                </div>

                <!-- Dirección -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Dirección exacta</label>
                  <div class="col-md-7">
                    <textarea placeholder="Por favor escriba su direccion lo mas exacta posible" name="direccion" id="" cols="44" rows="5" value= "{{ old('direccion') }}"></textarea>
                  </div>
                </div>

                <!-- Mensaje de encargado -->
                <div class="form-group row"> <br>
                  <div class="col-md-12 text-center">
                    <smal class=" text-muted">***   La siguiente sección se completa únicamente en caso de ser menor de edad.   ***
                  </div>
                </div>

                <!-- Sección de datos del responsable-->
                <h3 class="d-5 text-center">Datos del responsable</h3>

                <!-- Nombre del encargad@-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Nombre del encargado(a)</label>
                  <div class="col-md-7 inputGroupContainer">
                    <input  name="nombre_encargado" placeholder="Nombre" class="form-control"  type="text" value= "{{ old('nombre_encargado') }}">
                  </div>
                </div>

                <!-- Apellidos del encargad@ -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Apellidos del encargado(a)</label>
                  <div class="col-md-4 inputGroupContainer">
                    <input  name="apellidos_encargado" placeholder="Apellidos" class="form-control"  type="text" value= "{{ old('apellidos_encargado') }}">
                  </div>
                </div>

                <!-- Cedula del encargad@ -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">N° Cédula del encargado(a)</label>
                  <div class="col-md-4 inputGroupContainer">
                    <input  name="cedula_encargado" placeholder="Cédula"  pattern="[0-9]{9}" class="form-control"  type="number" value= "{{ old('cedula_encargado') }}">
                  </div>
                </div>

                <!-- Teléfono del encargad@-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"> N° Teléfono del encargado(a)</label>
                   <div class="col-md-4 inputGroupContainer">
                    <input name="telefono_encargado"  pattern="[0-9]{8}" placeholder="(+506)88888888" class="form-control" type="number" value= "{{ old('telefono_encargado') }}">
                  </div>
                </div>

                <!-- Parentesco -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Parentesco</label>
                  <div class="col-md-3 selectContainer">
                    <select name="parentesco" class="form-control selectpicker" value= "{{ old('parentesco') }}">
                      <option value="">Seleccione su parentesco</option>
                      <option >Madre</option>
                      <option >Padre</option>
                      <option >Abuelo(a)</option>
                      <option >Tío(a)</option>
                      <option >Hermano(a)</option>
                      <option >Encargado(a)</option>
                    </select>
                  </div>
                </div>


                <!-- Numero de Poliza -->

                <div class="form-group row">

                  <label class="col-md-4 col-form-label text-md-right">Numero de Poliza</label>

                  <div class="col-md-4 inputGroupContainer">

                  <input  name="poliza" placeholder="Numero de Poliza" class="form-control"  type="text">

                  </div>

              </div>
              
                <!-- Registrar alerta -->
                <div class="alert alert-success" role="alert" id="registrado">
                  Éxito al procesar su registro!
                  <i class="glyphicon glyphicon-thumbs-up"></i>
                </div>

                 <!-- Enviar y PDF -->
                 <div class="card">
                   <div class="card-body">
                      <div class="form-group row" >
                        <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                          <input type="file" class="offset-md-4  form-control-file" name="archivo" id="pdf" value= "{{ old('archivo') }}" >
                          <small id="pfd" class="text-muted">
                            En esta sección introduzca los archivos .PDF que se le solicitan.
                        </div>
                      </div>
                    
                   </div>
                 </div>

                  
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"></label>
                  <div class="col-md-7">
                    <button type="submit" class="btn btn-negro" >Enviar</button>
                  </div>
                </div>
                
          </form>
      </div>

      </div>

    </div>

  </div>

</div>

@endsection

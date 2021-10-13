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
        <form class="well form-horizontal" action="{{route('athletes.guardado')}} " method="post"  id="formulario_registro">
              <!-- Tíitulo del formulario -->
                @csrf
                <!-- Nombre -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-7">
                    <input  name="nombre" placeholder="Nombre" class="form-control"  type="text">
                  </div>
                </div>
{{$errors}}
                <!-- Apellidos -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Apellidos</label>
                  <div class="col-md-7">
                    <input name="apellidos" placeholder="Apellidos" class="form-control"  type="text">
                  </div>
                </div>

                <!-- Cedula -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Cédula</label>
                  <div class="col-md-7">
                    <input  name="cedula" placeholder="Cédula" class="form-control"  type="number" pattern="[0-9]{9}">
                  </div>
                </div>

                <!-- Disciplina -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right ">Disciplina</label>
                  <div class="col-md-5 ">
                    <select name="department" class="form-control selectpicker">
                      @foreach ($sports as $sport)
                      <option value="{{$sport->id}}">
                      {{$sport->description}}</option>

                      @endforeach
                      {{-- <option value="">Seleccione su disciplina</option>
                      <option >Ajedrez</option> <option >Atletismo</option>
                      <option >Baloncesto Femenino</option><option>Baloncesto Masculino</option>
                      <option >Balonmano Masculino</option> <option >Beisbol</option>
                      <option >Boxeo</option><option >Ciclismo</option>
                      <option >Futbol Masculino</option><option >Futbol Femenino</option>
                      <option >Futsal Masculino</option><option >Futsal Femenino</option>
                      <option >Gimnasia Artística</option> <option >Gimnasia Rítmica</option>
                      <option >Halterofilia</option> <option >Judo</option>
                      <option >Karate Do</option> <option> Natación</option>
                      <option >Patinaje</option> <option >Taek Won Do</option>
                      <option >Tenis de campo</option> <option >Tenis de mesa</option>
                      <option >Triatlon</option> <option >Voleibol Masculino</option>
                      <option >Voleibol Playa</option> <option >Tiro con arco</option>
                      <option >Football Americano</option> <option >Balonmano Femenino</option>
                      <option >Voleibol Femenino</option> --}}
                    </select>
                  </div>
                </div>

                <!-- Edad -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Edad</label>
                  <div class="col-md-5">
                  <input name="edad" placeholder="Edad" class="form-control" type="date"></div>
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
                    <input name="correo" placeholder="E-mail" class="form-control"  type="email">
                  </div>
                </div>

                <!-- Teléfono -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"> N° Teléfono</label>
                    <div class="col-md-5">
                    <input name="telefono" placeholder="(+506)88888888" class="form-control" type="number" pattern="[0-9]{8}" >
                  </div>
                </div>

                <!-- Provincia -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Provincia</label>
                  <div class="col-md-3 selectContainer">
                    <select name="provincia" placeholder="Provincia" class="form-control selectpicker">
                        <option value="0">Seleccione su Provincia</option>
                            <option value="San Jose">San Jose</option>
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
                    <input name="canton" placeholder="Cantón" class="form-control"  type="text">
                  </div>
                </div>

                <!-- Dirección -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" >Dirección exacta</label>
                  <div class="col-md-7">
                    <textarea placeholder="Por favor escriba su direccion lo mas exacta posible" name="direccion" id="" cols="44" rows="5"></textarea>
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
                    <input  name="nombre_encargado" placeholder="Nombre" class="form-control"  type="text">
                  </div>
                </div>

                <!-- Apellidos del encargad@ -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Apellidos del encargado(a)</label>
                  <div class="col-md-4 inputGroupContainer">
                    <input  name="apellidos_encargado" placeholder="Apellidos" class="form-control"  type="text">
                  </div>
                </div>

                <!-- Cedula del encargad@ -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">N° Cédula del encargado(a)</label>
                  <div class="col-md-4 inputGroupContainer">
                    <input  name="cedula_encargado" placeholder="Cédula" class="form-control"  type="number" pattern="[0-9]{9}">
                  </div>
                </div>

                <!-- Teléfono del encargad@-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"> N° Teléfono del encargado(a)</label>
                   <div class="col-md-4 inputGroupContainer">
                    <input name="telefono_encargado" placeholder="(+506)88888888" class="form-control" type="number"  pattern="[0-9]{8}">
                  </div>
                </div>

                <!-- Parentesco -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Parentesco</label>
                  <div class="col-md-3 selectContainer">
                    <select name="parentesco" class="form-control selectpicker">
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

                <!-- Registrar alerta -->
                <div class="alert alert-success" role="alert" id="registrado">
                  Éxito al procesar su registro!
                  <i class="glyphicon glyphicon-thumbs-up"></i>
                </div>

                <!-- Enviar y PDF -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right"></label>
                  <div class="col-md-7">
                    <button type="submit" class="btn btn-negro" >Enviar</button>
                  </div>
                </div>

                <div class="form-group row" >
                  <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                    <input type="file" class="offset-md-4  form-control-file" name="archivo" id="pdf">
                    <small id="pfd" class="text-muted">
                      En esta sección introduzca los archivos .PDF que se le solicitan.
                  </div>
                </div>
          </form>
      </div>

      </div>

    </div>

  </div>

</div>

@endsection

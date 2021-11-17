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

                <!-- Titulo-->
                <div class="text-center card-header">
                    <h3 class="d-5">Formulario de registro de Entrenadores</h3>
                </div>
                <div class="card-body">

                    <!-- Formulario-->

                    <form class="well form-horizontal" action="{{route('coach.guardarCoach')}} " method="post"  id="formulario_registro" enctype="multipart/form-data">
                        @csrf

                        <!--Nombre-->
                        <x-row>
                            <x-input name="nombre" placeholder="Nombre" label="Nombre"/>
                        </x-row>

                        <!--Apellidos-->
                        <x-row>
                            <x-input name="apellidos" placeholder="Apellidos" label="Apellidos"/>
                        </x-row>

                        <!--Cedula--->
                        <x-row>
                            <x-input name="cedula" placeholder="Cedula Formato 9 Digitos" label="Cedula" type="number"/>
                        </x-row>

                        <!--Genero-->
                        <x-row>
                            <label class="col-md-4 col-form-label text-md-right">Género</label>
                            <div class="col-md-7">
                                <div class="checkbox"><label><input type="radio" name="genero" value="f" /> Femenino</label></div>
                                <div class="checkbox"><label><input type="radio" name="genero" value="m" /> Masculino</label></div>
                                <div class="checkbox"><label><input type="radio" name="genero" value="n" /> Otro</label></div>
                            </div>
                        </x-row>

                        <!--Password-->
                        <x-row>
                            <x-input name="password" placeholder="Contraseña" label="Contraseña" type="password"/>
                        </x-row>

                        <!-- Comfirmar password-->
                        <x-row>
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-7">
                                <input placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </x-row>
                        <!--Disciplina-->
                        <x-row>
                            <label class="col-md-4 col-form-label text-md-right ">Disciplina</label>
                            <div class="col-md-5">
                                <select name="department" class="form-control selectpicker" value= "{{ old('department') }}">
                                    @foreach ($sports as $sport)
                                    <option value="{{$sport->id}}">
                                        {{$sport->description}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </x-row>

                        <!--Telefono de habitacion-->
                        <x-row>
                            <x-input name="teleHabitacion" placeholder="Teléfono de habitación Formato 8 Digitos" label="Tel. Habitacion" type="number"/>
                        </x-row>

                        <!--Correo -->
                        <x-row>
                            <x-input name="correo" placeholder="Correo" label="Correo" type="email"/>
                        </x-row>

                        <!--Telefono Celular -->
                        <x-row>
                            <x-input name="telCelular" placeholder="Telefono Celular Formato 8 Digitos" label="Tel. Celular" type="number"/>
                        </x-row>

                        <!--Direccion (text-area) -->
                        <x-row>
                            <label class="col-md-4 col-sm-12 col-form-label text-md-right" >Dirección exacta</label>
                            <div class="col-md-7 col-sm-12">
                                <textarea placeholder="Por favor escriba su direccion lo mas exacta posible" name="direccion" id="" style="width:100%; height:100px;" value= "{{ old('direccion') }}"></textarea>
                            </div>
                        </x-row>

                        <!--Años de experiencia -->
                        <x-row>
                            <x-input name="experiencia" placeholder="Años de experiencia" label="Años de experiencia" type="number"/>
                        </x-row>

                        <!--Numero de contrato -->
                        <x-row>
                            <x-input name="numContrato" placeholder="Numero de contrato" label="Numero de Contrato" type="number"/>
                        </x-row>

                        <!--Periodo de ligamen con la institucion (meses de contrato) -->
                        <x-row>
                            <x-input name="periodoContrato" placeholder="Periodo de ligamen con la institución" type="number" label="Periodo"/>
                        </x-row>

                        <!--Fotocopia de la cedula (boton para adjuntar pdf) -->
                        <!--Insercion de pdfs -->
                        <div class="card">
                            <p class="text-center">En esta seccion debe adjuntar la fotocopia de su cedula en forma de pdf</p>
                            <div class="card-body">
                                <div class="form-group row" >
                                    <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                                    <input type="file" class="offset-md-4  form-control-file" name="archivo" id="pdf" value= "{{ old('archivo') }}" >
                                    <small id="pfd" class="offset-md-1 text-center text-muted">
                                        En esta sección introduzca el archivo pdf solicitado.
                                    </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Boton para registrar funcionario -->
                        <x-row>
                            <div class="offset-md-4 col-md-6 p-2">
                                <button type="submit" class="btn btn-negro" >Registrar</button>
                            </div>
                        </x-row>

                   </div>
                 </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


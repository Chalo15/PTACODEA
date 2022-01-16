@extends('layouts.app')

@section('content')
<body class="athletes">
    
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
                        <h3 class="d-5">Formulario de Registro del Atleta</h3>
                    </div>
                    
                    <div class="card-body">
                        <form name="formulario1" class="well form-horizontal" action="{{route('external_athletes.guardado')}} " method="post"  id="formulario_registro" enctype="multipart/form-data">
                            <!-- Título del formulario -->
                            @csrf
                            
                            
                            <!-- Nombre -->
                            <x-row>
                                <x-input name="nombre" placeholder="Nombre" label="Nombre"/>
                            </x-row>
                                
                                <!-- Apellidos -->
                                <x-row>
                                    <x-input name="apellidos" placeholder="Apellidos" label="Apellidos"/>
                            </x-row>

                            <!-- Cedula -->
                            
                            <x-row>
                                <x-input name="cedula" placeholder="Cedula Formato 9 Digitos" label="Cédula"/>
                            </x-row>
                            

                            <!-- Disciplina -->
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

                            <!-- Edad -->
                            <x-row>
                                <x-input name="edad" placeholder="Edad" label="Edad" type="date"/>
                            </x-row>
                            
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
                            <x-row>
                                <x-input name="correo" placeholder="E-mail" label="Correo electrónico" type="email" />
                            </x-row>
                            
                            <!-- Teléfono -->
                            <x-row>
                                <x-input name="telefono" placeholder="(+506)88888888" label="N° Teléfono" type="number" />
                            </x-row>
                            
                            <!-- Sangre -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tipo de Sangre</label>
                                <div class="col-md-3 selectContainer">
                                    <select name="sangre" placeholder="Tipo Sangre" class="form-control" type="text" value="{{ old('sangre') }}">
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
                                <label class="col-md-4 col-form-label text-md-right">Provincia de residencia</label>
                                <div class="col-md-3 selectContainer">
                                    <select name="provincia" onchange="cambia()" placeholder="Provincia" class="seleccion form-control" type="text" value="{{ old('provincia') }}">
                                        <option value="0">Seleccione su Provincia</option>
                                        <option value="SanJose">San José</option>
                                        <option value="Alajuela">Alajuela</option>
                                        <option value="Cartago">Cartago</option>
                                        <option value="Heredia">Heredia</option>
                                        <option value="Guanacaste">Guanacaste</option>
                                        <option value="Puntarenas">Puntarenas</option>
                                        <option value="Limon">Limón</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Cantón -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Cantón</label>
                                <div class="col-md-3">
                                    <select class="seleccion form-control" name="canton">
                                        <option value="-">Seleccione
                                    </select>

                                </div>
                            </div>
                            
                            <!-- Dirección -->
                            <div class="form-group row">
                                
                                <label class="col-md-4 col-form-label text-md-right">Dirección exacta</label>
                                <div class="col-md-7">
                                    <textarea placeholder="Por favor escriba su direccion lo mas exacta posible" name="direccion" id="" cols="44" rows="5" value="{{ old('direccion') }}"></textarea>
                                    
                                </div>
                            </div>
                            
                            <!-- Lateralidad -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Lateralidad</label>
                                <div class="col-md-7">
                                    <div class="checkbox"><label><input type="radio" name="lateralidad" value="D" /> Diestro</label></div>
                                    <div class="checkbox"><label><input type="radio" name="lateralidad" value="I" /> Zurdo</label></div>
                                    <div class="checkbox"><label><input type="radio" name="lateralidad" value="A" /> Ambidiestro</label></div>
                                </div>
                            </div>

                            <!-- Mensaje de encargado -->
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <small class=" text-muted">*** La siguiente sección se completa únicamente en caso de ser menor de edad. ***
                                </div>
                            </div>
                                    



                            <div class="accordion" id="accordionExample">
                                
                                <div class="text-center card-header" id="headingOne">
                                    <h5 class="text-center btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"">
                                        Desplegar Formulario
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    


                                    <!-- Sección de datos del responsable-->
                                    <h3 class="d-5 pt-2 text-center">Datos del responsable</h3>
                                            
                                            <!-- Nombre del encargad@-->
                                    <x-row>
                                        <x-input name="nombre_encargado" placeholder="Nombre" label="Nombre del encargado(a)" />
                                    </x-row>
                                    
                                    <!-- Apellidos del encargad@ -->
                                    <x-row>
                                        <x-input name="apellidos_encargado" placeholder="Apellidos" label="Apellidos del encargado(a)" />
                                    </x-row>
                                    
                                    <!-- Cedula del encargad@ -->
                                    <x-row>
                                        <x-input name="cedula_encargado" placeholder="Cédula" label="N° Cédula del encargado(a)" type="number" />
                                    </x-row>
                                    
                                    <!-- Teléfono del encargad@-->
                                    <x-row>
                                        <x-input name="telefono_encargado" placeholder="(+506)88888888" label="N° Teléfono del encargado(a)" type="number" />
                                    </x-row>
                                    
                                    
                                    <!-- Registrar alerta -->
                                    
                                    
                                    <!-- Parentesco -->
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Parentesco</label>
                                        <div class="col-md-3 selectContainer">
                                            <select name="parentesco" class="form-control selectpicker" value="{{ old('parentesco') }}">
                                                <option value="">Seleccione su parentesco</option>
                                                <option>Madre</option>
                                                <option>Padre</option>
                                                <option>Abuelo(a)</option>
                                                <option>Tío(a)</option>
                                                <option>Hermano(a)</option>
                                                <option>Encargado(a)</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <!-- Numero de Poliza -->
                                    <x-row>
                                        <x-input name="poliza" placeholder="Numero de Poliza" label="Numero de Poliza" />
                                    </x-row>
                                    
                                    <!-- Registrar alerta -->
                                    <!-- <div class="alert alert-success" role="alert" id="registrado">
                                        Éxito al procesar su registro!
                                        <i class="glyphicon glyphicon-thumbs-up"></i>
                                    </div>-->
                                    
                                    <!-- Enviar y PDF -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="text-center justify-content-center form-group col-sm-12 flex-column d-flex">
                                                    <input type="file" class="offset-md-4  form-control-file" name="archivo" id="pdf" value="{{ old('archivo') }}">
                                                    <small id="pfd" class="text-muted">
                                                        En esta sección introduzca el archivo pdf solicitado.
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                            
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-negro">Registrar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            <!-- <button   onclick="window.location='{{ url("users/athletes/datasession") }}'" class="btn btn-negro ml-auto m-1">
                {{__('Registrarse Datos Sesion')}}
            -->
        </div>
        
    </div>
    
</div>

</body>
@endsection

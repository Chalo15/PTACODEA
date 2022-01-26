<x-guest-layout title="Registrarme">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Registro
                    </div>

                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input name="identification" value="{{ old('identification') }}" />
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <x-input name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <x-input name="last_name" value="{{ old('last_name') }}" />
                                </div>
                            </div>

                            {{-- Correo Electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input type="email" name="email" value="{{ old('email') }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <x-input name="phone" type="number" value="{{ old('phone') }}" />
                                </div>
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password" type="password" />
                                </div>
                            </div>

                            {{-- Confirmación de contraseña --}}
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password_confirmation" type="password" />
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> &nbsp;
                                    Registrar
                                </button>
                            </div>

                        </form>

                        <hr>

                        <div class="row">
                            <div class="col">
                                ¿Ya tienes cuenta? Click <a href="{{ route('login') }}" class="link">aquí</a>.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row"> --}}
    {{-- <div class="col">

            <div class="card">
                <div class="card-header">
                    Registro
                </div>

                <div class="card-body">

                    <div x-data="{ open: false }">

                        <form action="/register" method="POST">
                            @csrf

                            <div class="form-group row">
                                <x-label title="Nombre" />
                                <x-input name="name" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Apellidos" />
                                <x-input name="lastname" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Correo Electrónico" />
                                <x-input name="email" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Género" />
                                <x-input name="genre" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Teléfono" />
                                <x-input name="phone" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Contraseña" />
                                <x-input type="password" name="password" />
                            </div>

                            <div class="form-group row">
                                <x-label title="Confirmar contraseña" />
                                <x-input type="password" name="password_confirmation" />
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-negro">Registrarme</button>
                                </div>
                                <div class="col">
                                    <button type="button" @click="open = !open" class="btn btn-negro">Soy Atleta</button>
                                </div>
                            </div>

                            <span x-show="open">
                                <div class="form-group row">
                                    <x-label title="Disciplina" />
                                </div>
                            </span>



                            <div class="form-group row">

                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-7">
        <input placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    </div>

    <div class="form-group row">

        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

        <div class="col-md-7">
            <input placeholder="Apellidos" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

            @error('apellido')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">

        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

        <div class="col-md-7">
            <input placeholder="Cédula" type="number" pattern="[0-9]{9}" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}" required autocomplete="identification" autofocus>

            @error('cedula')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <!-- Género -->
    <div class="form-group row">

        <label class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

        <div class="col-md-7 ">

            <div class="checkbox"><label><input type="radio" name="genero" value="f" /> Femenino</label></div>
            <div class="checkbox"><label><input type="radio" name="genero" value="m" /> Masculino</label></div>
            <div class="checkbox"><label><input type="radio" name="genero" value="n" /> Otro</label></div>

        </div>

    </div>

    <div class="form-group row">

        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

        <div class="col-md-7">
            <input placeholder="Teléfono" type="number" pattern="[0-9]{8}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

        <div class="col-md-7">
            <input placeholder="Correo" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col-md-7">
            <input placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

        <div class="col-md-7">
            <input placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

    </div>

    <div class="form-group row">
        <div class="col-8 col-md-8 offset-md-4">
            <button type="submit" class="btn btn-negro m-1">
                {{ __('Registrarse') }}
            </button>

            <a href="/users/externalathletes" class="btn btn-negro">
                {{__('Registrarse como Atleta')}}
            </a>

            <button @click="open = !open" class="btn btn-negro">Soy Atleta</button>
        </div>
    </div>

    <div x-show="open">

        <x-row>
            <x-input name="nombre" placeholder="Nombre" label="Nombre" />
        </x-row>

        <!-- Apellidos -->
        <x-row>
            <x-input name="apellidos" placeholder="Apellidos" label="Apellidos" />
        </x-row>

        <!-- Cedula -->

        <x-row>
            <x-input name="cedula" placeholder="Cedula Formato 9 Digitos" label="Cédula" />
        </x-row>


        <!-- Disciplina -->
        <x-row>
            <label class="col-md-4 col-form-label text-md-right ">Disciplina</label>
            <div class="col-md-5">
                <select name="department" class="form-control selectpicker" value="{{ old('department') }}">
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
            <x-input name="edad" placeholder="Edad" label="Edad" type="date" />
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

                                <div id=" collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">



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

    </div>

    </form>
    </div>
    </div>
    </div>

    </div> --}}

</x-guest-layout>

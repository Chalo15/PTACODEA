@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="text-center card-header"><h3 class="d-5">Registro de Usuario</h3></div>

                <div class="usuario text-center"><i class="fas fa-user p-2"></i></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.guardarUser') }}">
                        @csrf

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
<<<<<<< HEAD
                                <input placeholder="Contraseña"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
=======
                                <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
>>>>>>> parent of 64af3d7 (Css, home page)

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
<<<<<<< HEAD
                                <input placeholder="Confirmar Contraseña"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
=======
                                <input placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
>>>>>>> parent of 64af3d7 (Css, home page)
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-negro m-1">
                                    {{ __('Registrarse') }}

<<<<<<< HEAD
                                <button onclick= "window.location='{{ url('users/externalathletes') }}'" class="btn btn-negro ml-auto m-1">
=======
                                <button onclick= "window.location='{{ url('users/athletes') }}'" class="btn btn-negro ml-auto m-1">
>>>>>>> parent of 64af3d7 (Css, home page)
                                    {{__('Registrarse como Atleta')}}

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

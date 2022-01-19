<x-guest-layout title="Iniciar Sesión">

    <div class="d-flex justify-content-center">
        <div class="row" style="width: 700px;">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>

                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input name="identification" value="{{ old('identification') }}" />
                                </div>
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password" type="password" />
                                </div>
                            </div>

                            {{-- Recordarme --}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                                <label class="form-check-label" for="remember">Recordarme</label>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> &nbsp;
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>

                        <hr>

                        <div class="row">
                            <div class="col mb-3">
                                ¿No tienes una cuenta? Click <a href="{{ route('register') }}" class="link">aquí</a>.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                ¿Olvidaste tu contraseña? Click <a href="{{ route('password.request') }}" class="link">aquí</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-3">

                    <div class="text-center card-header">
                        <h3 class="text-dark">Verificacion de Usuario</h3>
                    </div>

                    <div class="usuario text-center"><i class="fas fa-user p-2"></i></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">

        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-7">
            <input placeholder="Usuario" id="email" type="number" class="usuario_login form-control @error('email') is-invalid @enderror" name="identification" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
            <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recordar') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-negro">
                {{ __('Iniciar Sesion') }}
            </button>
            <a href="{{ route('register') }}" type="button" class="btn btn-negro">{{ __('Registrarse') }}</a>
            <!--@if (Route::has('password.request'))
                                <a class="forgot-password btn btn-negro" href="{{ route('password.request') }}">
                                    {{ __('Olvidé mi contraseña') }}
                                </a>-->

            @endif
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div> --}}
</x-guest-layout>

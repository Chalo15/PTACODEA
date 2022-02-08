<x-guest-layout title="Iniciar Sesión">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
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

 
</x-guest-layout>

<x-guest-layout title="Cambiar Contraseña">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Cambiar Contraseña
                    </div>

                    <div class="card-body">

                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            {{-- Token --}}
                            <input type="hidden" name="token" value="{{ $token }}">

                            {{-- Correo electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input name="email" placeholder="johndoe@example.com" value="{{ old('email') }}" />
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
                                <button class="btn btn-dark">Restablecer contraseña</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-guest-layout>

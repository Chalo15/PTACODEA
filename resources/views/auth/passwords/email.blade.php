<x-guest-layout title="Recuperar Contraseña">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Cambiar Contraseña
                    </div>

                    <div class="card-body">
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf

                            {{-- Correo electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input name="email" placeholder="johndoe@example.com" value="{{ old('email') }}" />
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">Enviar enlace de recuperación</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

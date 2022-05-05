<x-app-layout title="Perfil">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            Foto de Perfil
                        </div>

                        <div class="card-body">
                            <div x-data="{ isOpen: {{ old('picture') || $errors->has('picture') ? 'true' : 'false' }} }">

                                <div x-show="!isOpen">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <img src="{{ $user->photo ? asset($user->photo) : asset('images/default.png') }}" class="rounded mx-auto d-block" width="200" height="200">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button @click="isOpen = !isOpen" type="button" class="btn btn-secondary">
                                            <i class="fas fa-edit"></i> &nbsp;
                                            Editar
                                        </button>
                                    </div>
                                </div>

                                <div x-show="isOpen">
                                    <form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col d-flex justify-content-center mb-3">
                                                <img id="selected" class="rounded" style="max-height: 200px; max-width: 200px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <x-input type="file" name="image" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button @click="isOpen = !isOpen" type="button" class="btn btn-secondary mr-3">
                                                    <i class="fas fa-times"></i> &nbsp;
                                                    Cancelar
                                                </button>

                                                <button class="btn btn-primary">
                                                    <i class="fas fa-save"></i> &nbsp;
                                                    Actualizar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <div class="card mb-3">
                        <div class="card-header">
                            Cambiar Contraseña
                        </div>

                        <div class="card-body">
                            <form id="form_personal_information" action="{{ route('profile.update-password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Contraseña --}}
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Contraseña Actual</label>
                                    <div class="col-sm-8">
                                        <x-input name="current_password" type="password" />
                                    </div>
                                </div>

                                <hr>

                                {{-- Contraseña --}}
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Nueva Contraseña</label>
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

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-save"></i> &nbsp;
                                        Actualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg">

            <div class="card mb-3">
                <div class="card-header">
                    Información Personal
                </div>

                <div class="card-body">
                    <form id='form_personal_information' action="{{ route('profile.update-personal-information') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                            <div class="col-sm-8">
                                <x-input readonly name="identification" value="{{ $user->identification }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <x-input  readonly name="name" value="{{ $user->name }}" />
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <x-input  readonly name="last_name" value="{{ $user->last_name }}" />
                            </div>
                        </div>

                        {{-- Fecha de Nacimiento --}}
                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="birthdate" value="{{ $user->birthdate }}" />
                            </div>
                        </div>

                        {{-- Provincia --}}
                        <div class="form-group row">
                            <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <x-select name="province">
                                    <option {{ !$user->province ? 'selected' : '' }} disabled value=""> -- Seleccione -- </option>
                                    @foreach ($provinces as $province)
                                    <option {{ $user->province && $user->province == $province  ? 'selected' : '' }} value="{{ $province }}">{{ $province }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Ciudad --}}
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                            <div class="col-sm-8">
                                <x-input id='city' name="city" value="{{ $user->city }}" />
                            </div>
                        </div>

                        <hr>

                        {{-- Correo Electrónico --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                            <div class="col-sm-8">
                                <x-input type="email" name="email" value="{{ $user->email }}" />
                            </div>
                        </div>

                        {{-- Teléfono --}}
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <x-input id='phone' name="phone" value="{{ $user->phone }}" />
                            </div>
                        </div>

                        {{-- Dirección Exacta --}}
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-8">
                                <x-textarea name="address" value="{{ $user->address }}" />
                            </div>
                        </div>

                        <hr>

                        {{-- Género --}}
                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Género</label>
                            <div class="col-sm-8">
                                @foreach ($genders as $gender)
                                <div class="custom-control custom-radio">
                                    <input {{ $user->gender == $gender ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ $gender }}">
                                    <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">
                                <i class="fas fa-save"></i> &nbsp;
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#selected').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
 
    </script>
    @endpush
    

</x-app-layout>

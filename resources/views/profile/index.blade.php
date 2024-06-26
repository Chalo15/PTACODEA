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
                                            <img src="{{ $user->photo ? asset($user->photo) : asset('images/default.png') }}"
                                                class="rounded mx-auto d-block" width="200" height="200">
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
                                    <form action="{{ route('profile.update-picture') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col d-flex justify-content-center mb-3">
                                                <img id="selected" class="rounded"
                                                    style="max-height: 200px; max-width: 200px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <x-input type="file" name="image" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button @click="isOpen = !isOpen" type="button"
                                                    class="btn btn-secondary mr-3">
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
                            <form id='form_profile_index1' action="{{ route('profile.update-password') }}"
                                method="POST">
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
                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                        contraseña</label>
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
                    <form id='form_profile_index2' action="{{ route('profile.update-personal-information') }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                DIMEX</label>
                            <div class="col-sm-8">
                                <x-input readonly name="identification" value="{{ $user->identification }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">

                                <x-input readonly name="name" value="{{ $user->name }}" />

                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">

                                <x-input readonly name="last_name" value="{{ $user->last_name }}" />
                            </div>
                        </div>

                        {{-- Fecha de Nacimiento --}}

                        <!-- @php
                            $today = today()->toDateString();
                            $age = today()
                                ->subYears(18)
                                ->toDateString();
                        @endphp -->

                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="birthdate" value="{{ $user->birthdate }}" />
                            </div>
                        </div>

                        {{-- Cantón --}}
                        <div class="form-group row">
                            <label for="canton" class="col-sm-4 col-form-label">Cantón</label>
                            <div class="col-sm-8">
                                <x-input id='canton' name="canton" value="{{ $user->canton }}" />
                            </div>
                        </div>

                        {{-- Distrito --}}
                        <div class="form-group row">
                            <label for="district" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <x-select name="district">
                                    <option {{ !$user->district ? 'selected' : '' }} readonly value=""> -- Seleccione
                                        -- </option>
                                    @foreach ($districts as $district)
                                        <option
                                            {{ $user->district && $user->district == $district ? 'selected' : '' }}
                                            value="{{ $district }}">{{ $district }}</option>
                                    @endforeach
                                </x-select>
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
                                        <input {{ $user->gender && $user->gender == $gender ? 'checked' : '' }}
                                            class="custom-control-input" type="radio" name="gender"
                                            id="gender-{{ $loop->index }}"
                                            value="{{ old('gender') ?? $user->gender }}">
                                        <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                            {{ $gender }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <hr>

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
            //Metodo para validar número telefónico
            jQuery.validator.addMethod("phonenumber", function(value, element) {
                if (/^\d{3}-?\d{3}-?\d{2}$/g.test(value)) {
                    return true;
                } else {
                    return false;
                };
            }, "El número telefónico debe tener 8 dígitos *");

            //Método que valida solo numeros
            jQuery.validator.addMethod("numbersonly", function(value, element) {
                return this.optional(element) || /^[0-9]+$/i.test(value);
            }, 'Por favor digite solo valores numéricos y números naturales *', );
            //Método que valida solo letras
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z," "]+$/i.test(value);
            }, 'Por favor digite solo cadenas de texto sin números o caracteres especiales *', );
            //Método que valida la contraseña
            jQuery.validator.addMethod("passwordCheck",
                function(value, element, param) {
                    if (this.optional(element)) {
                        return true;
                    } else if (!/[A-Z]/.test(value)) {
                        return false;
                    } else if (!/[a-z]/.test(value)) {
                        return false;
                    } else if (!/[0-9]/.test(value)) {
                        return false;
                    }
                    return true;
                },
                "Por motivos de seguridad, asegúrese de que su contraseña contenga letras mayúsculas, minúsculas y dígitos *"
            );
            //Validaciones del formulario
            if ($('#form_profile_index1').length > 0) {
                $('#form_profile_index1').validate({
                    rules: {
                        password: {
                            required: true,
                            passwordCheck: true,
                            minlength: 8,
                            maxlength: 60
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password: {
                            required: 'Por favor ingrese su contraseña *',
                            minlength: 'La contraseña no puede ser menor a 8 caracteres *',
                            maxlength: 'La contraseña no puede ser mayor a 60 caracteres *'
                        },
                        password_confirmation: {
                            required: 'Por favor ingrese de nuevo su contraseña *',
                            equalTo: 'Por favor introduzca la misma contraseña *'
                        },
                    }
                });
            }
            //Formulario del index2
            if ($('#form_profile_index2').length > 0) {
                $('#form_profile_index2').validate({
                    rules: {
                        birthdate: {
                            required: true
                        },
                        district: {
                            required: true
                        },
                        canton: {
                            required: true,
                            lettersonly: true,
                            minlength: 3,
                            maxlength: 30
                        },
                        email: {
                            required: true,
                            maxlength: 30,
                            minlength: 3,
                            email: true
                        },
                        phone: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        address: {
                            required: true,
                            minlength: 20,
                            maxlength: 120
                        },
                    },
                    messages: {
                        birthdate: {
                            required: 'Por favor ingrese su fecha de nacimiento *'
                        },
                        district: {
                            required: 'Por favor ingrese su provincia *'
                        },
                        canton: {
                            required: 'Por favor ingrese la ciudad donde vive *',
                            maxlength: 'La ciudad no puede ser mayor a 30 caracteres *',
                            minlength: 'La ciudad no puede ser menor a 3 caracteres *'
                        },
                        email: {
                            required: 'Por favor ingrese su email *',
                            email: 'Por favor ingrese una dirección de correo electrónico válida *',
                            maxlength: 'Su correo electrónico no puede ser de más de 30 caracteres *',
                            minlength: 'Su correo electrónico no puede ser de menos de 3 caracteres *'
                        },
                        phone: {
                            required: 'Por favor ingrese su número telefónico *'
                        },
                        address: {
                            required: 'Por favor ingrese su dirección completa *',
                            maxlength: 'Su dirección no puede ser de más de 120 caracteres *',
                            minlength: 'Su dirección no puede ser de menos de 20 caracteres *'
                        },
                    }
                });
            }
        </script>
    @endpush


</x-app-layout>

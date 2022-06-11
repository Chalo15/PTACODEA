<x-app-layout title="Nuevo Usuario">

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
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center d-block font-weight-bold ">
                        Nuevo Usuario
                    </h2>
                </div>

                <div class="card-body">
                    <form id='form_users_create' action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="user-form">
                        @csrf

                        {{--@json($errors->all())--}}
                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                DIMEX</label>
                            <div class="col-sm-8">
                                <x-input name="identification" id="identification" value="{{ old('identification') }}" />
                                <span class="badge text-danger errors-identification"></span>
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <x-input name="name" id="name" value="{{ old('name') }}" />
                                <span class="badge text-danger errors-name"></span>
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <x-input name="last_name" id="last_name" value="{{ old('last_name') }}" />
                                <span class="badge text-danger errors-last_name"></span>
                            </div>
                        </div>

                        {{-- Fecha de Nacimiento --}}

                        @php
                        $today = today()->toDateString();
                        $age = today()
                        ->subYears(18)
                        ->toDateString();
                        @endphp

                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-8">
                                <x-input type="date" id="birthdate" max="{{ $age }}" name="birthdate" value="{{ old('birthdate') }}" />
                                <span class="badge text-danger errors-birthdate"></span>
                            </div>
                        </div>

                        {{-- Cantón --}}
                        <x-input name="canton" type="hidden" value="Alajuela" />

                        {{-- Distrito --}}
                        <div class="form-group row">
                            <label for="district" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <x-select name="district">
                                    <option disabled {{ old('district') ? '' : 'selected' }} value=""> --
                                        Seleccione -- </option>
                                    @foreach ($districts as $district)
                                    <option {{ old('district') == $district ? 'selected' : '' }} value="{{ $district }}">{{ $district }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <hr>

                        {{-- Correo Electrónico --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                            <div class="col-sm-8">
                                <x-input type="email" id="email" name="email" value="{{ old('email') }}" />
                                <span class="badge text-danger errors-email"></span>
                            </div>
                        </div>

                        {{-- Teléfono --}}
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <x-input name="phone" id="phone" value="{{ old('phone') }}" />
                                <span class="badge text-danger errors-phone"></span>
                            </div>
                        </div>

                        {{-- Dirección Exacta --}}
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-8">
                                <x-textarea name="address" id="address">
                                    {{ old('address') }}
                                </x-textarea>
                                <span class="badge text-danger errors-address"></span>
                            </div>
                        </div>

                        <hr>

                        {{-- Género --}}
                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Género</label>
                            <div class="col-sm-8">
                                @foreach ($genders as $gender)
                                <div class="custom-control custom-radio">
                                    <input {{ (old('gender') && old('gender') == $gender) || (!old('gender') && $loop->index == 0) ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ $gender }}">
                                    <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <hr>

                        {{-- Años de Experiencia --}}
                        <div class="form-group row">
                            <label for="experience" class="col-sm-4 col-form-label">Años de Experiencia</label>
                            <div class="col-sm-8">
                                <x-input name="experience" id="experience" value="{{ old('experience') }}" />
                                <span class="badge text-danger errors-experience"></span>
                            </div>
                        </div>

                        {{-- Número de Contrato --}}
                        <div class="form-group row">
                            <label for="contract_number" class="col-sm-4 col-form-label">Número de Contrato</label>
                            <div class="col-sm-8">
                                <x-input name="contract_number" id="contract_number" value="{{ old('contract_number') }}" />
                                <span class="badge text-danger errors-contract_number"></span>
                            </div>
                        </div>

                        {{-- Año de Contrato --}}
                        <div class="form-group row">
                            <label for="contract_year" class="col-sm-4 col-form-label">Años de Contrato</label>
                            <div class="col-sm-8">
                                <x-input name="contract_year" id="contract_year" value="{{ old('contract_year') }}" />
                                <span class="badge text-danger errors-contract_year"></span>
                            </div>
                        </div>

                        <hr>

                        {{-- Role --}}
                        <div x-data="{ role: '{{ old('role_id') ?? '' }}' }">

                            <div class="form-group row">
                                <label for="role_id" class="col-sm-4 col-form-label">Rol</label>
                                <div class="col-sm-8">
                                    <x-select name="role_id" id="role_id" x-model="role">
                                        <option disabled value=""> -- Seleccione -- </option>
                                        @foreach ($roles as $role)
                                        @if ($role->id == 3)
                                        @continue
                                        @endif

                                        <option value="{{ $role->id }}">{{ $role->description }}</option>
                                        @endforeach
                                    </x-select>
                                    <span class="badge text-danger errors-role_id"></span>
                                </div>
                            </div>

                            {{-- Entrenadores --}}
                            <div x-show="role == 2">

                                {{-- Deporte --}}
                                <div class="form-group row">
                                    <label for="sport_id" class="col-sm-4 col-form-label">Deporte</label>
                                    <div class="col-sm-8">
                                        <x-select name="sport_id" id="sport_id">
                                            <option disabled {{ old('sport_id') ? '' : 'selected' }} value=""> --
                                                Seleccione -- </option>
                                            @foreach ($sports as $sport)
                                            <option {{ old('sport_id') == $sport->id ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                                            @endforeach
                                        </x-select>
                                        <span class="badge text-danger errors-sport_id"></span>
                                    </div>
                                </div>

                                {{-- Teléfono Celular --}}
                                <div class="form-group row">
                                    <label for="other_phone" class="col-sm-4 col-form-label">Teléfono Celular</label>
                                    <div class="col-sm-8">
                                        <x-input name="other_phone" id="other_phone" value="{{ old('other_phone') }}" />
                                        <span class="badge text-danger errors-other_phone"></span>
                                    </div>
                                </div>

                                {{-- Fotocópia de Cédula --}}
                                <div class="form-group row">
                                    <label for="url" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <label class="custom-file-label" for="identification_image">Elija el
                                                archivo
                                            </label>
                                            <input name="url" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Contraseña --}}
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                            <div class="col-sm-8">
                                <x-input name="password" id="password" type="password" />
                                <span class="badge text-danger errors-password"></span>
                            </div>
                        </div>

                        {{-- Confirmación de contraseña --}}
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                Contraseña</label>
                            <div class="col-sm-8">
                                <x-input name="password_confirmation" id="password_confirmation" type="password" />
                                <span class="badge text-danger errors-password_confirmation"></span>
                            </div>
                        </div>

                        {{-- Estado del Usuario --}}
                        <x-input name="condition" type="hidden" value="A" />

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" id="guardarBtn">
                                <i class="fas fa-save"></i> &nbsp;
                                Guardar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    @push('scripts')
    <script>

        //Change the name of the label-input-fule 
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).ready(function() {
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
                return this.optional(element) || /^[a-zA-ZÀ-ÿ\u00f1\u00d1," "]+$/i.test(value);
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
            if ($("#form_users_create").length > 0) {
                $('#form_users_create').validate({
                    rules: {
                        identification: {
                            required: true,
                            maxlength: 15,
                            minlength: 9
                        },
                        name: {
                            required: true,
                            lettersonly: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        last_name: {
                            required: true,
                            lettersonly: true,
                            minlength: 3,
                            maxlength: 30
                        },
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
                        experience: {
                            required: true,
                            numbersonly: true,
                            max: 50
                        },
                        contract_number: {
                            required: true,
                            numbersonly: true,
                            minlength: 1,
                            maxlength: 5
                        },
                        contract_year: {
                            required: true,
                            numbersonly: true,
                            max: 50,
                            min: 1
                        },
                        other_phone: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        role_id: {
                            required: true
                        },
                        password: {
                            required: true,
                            passwordCheck: true,
                            minlength: 8,
                            maxlength: 60
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        },
                        url: {
                            required: true
                        },
                        sport_id: {
                            required: true
                        },
                    },
                    messages: {
                        identification: {
                            required: 'Por favor ingrese su cédula *',
                            maxlength: 'Su cédula de identidad no puede ser mayor a 15 caracteres o dígitos *',
                            minlength: 'Su cédula de identidad no puede ser menor a 9 caracteres o dígitos *'
                        },
                        name: {
                            required: 'Por favor ingrese su nombre *',
                            maxlength: 'Su nombre no puede ser mayor a 30 caracteres *',
                            minlength: 'Su nombre no puede ser menor a 3 caracteres *'
                        },
                        last_name: {
                            required: 'Por favor ingrese sus apellidos *',
                            maxlength: 'Sus apellidos no pueden ser mayores a 30 caracteres *',
                            minlength: 'Sus apellidos no pueden ser menores a 3 caracteres *'
                        },
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
                            maxlength: 'Su dirección no puede ser de más de 20 caracteres *',
                            minlength: 'Su dirección no puede ser de menos de 120 caracteres *'
                        },
                        experience: {
                            required: 'Por favor ingrese sus años de experiencia *',
                            max: 'Sus años de experiencia no pueden ser de más de 50 *'
                        },
                        contract_number: {
                            required: 'Por favor ingrese su número de contacto *',
                            maxlength: 'Su número de contrato no puede ser de más de 5 caracteres *',
                            minlength: 'Su número de contrato no puede ser de menos de 1 caracter *'
                        },
                        contract_year: {
                            required: 'Por favor ingrese su años de contacto *',
                            max: 'Sus años de contrato no pueden ser de más de 50 *',
                            min: 'Sus años de contrato no pueden ser de menos de 1 *'
                        },
                        address: {
                            required: 'Por favor ingrese su dirección exacta *',
                            minlength: 'La dirección no puede ser menor a 20 caracteres *',
                            maxlength: 'La dirección no puede ser mayor a 120 caracteres *'
                        },
                        other_phone: {
                            required: 'Por favor ingrese su número telefónico *'
                        },
                        role_id: {
                            required: 'Por favor ingrese su rol *'
                        },
                        password: {
                            required: 'Por favor ingrese su contraseña *',
                            minlength: 'La contraseña no puede ser menor a 8 caracteres *',
                            maxlength: 'La contraseña no puede ser mayor a 60 caracteres *'
                        },
                        password_confirmation: {
                            required: 'Por favor ingrese de nuevo su contraseña *',
                            equalTo: 'Por favor introduzca la misma contraseña *'
                        },
                        url: {
                            required: 'Por favor ingrese la copia de su cédula de identidad *'
                        },
                        sport_id: {
                            required: 'Por favor ingrese su disciplina *'
                        },
                    }
                });
            }
        });
    </script>
    @endpush


</x-app-layout>
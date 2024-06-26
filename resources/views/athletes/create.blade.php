<x-app-layout title="Nuevo Atleta">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('athletes.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="text-center d-block font-weight-bold ">
                        Nuevo Atleta
                    </h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('athletes.store') }}" method="POST" id='form_athlete_create'>
                        @csrf

                        {{-- <div x-data="{ isOpen: {{ old('is_user') ? 'true' : 'false' }} }">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_user" id="is_user" x-model="isOpen">
                            <label class="form-check-label" for="is_user">
                                ¿El usuario se encuentra registrado en el sistema?
                            </label>
                        </div>

                        <hr>

                        <div x-show="isOpen">

                            <div class="form-group row">
                                <label for="user_id" class="col-sm-4 col-form-label">Usuario</label>
                                <div class="col-sm-8">
                                    <x-select2 name="user_id">
                                        <option disabled {{ old('user_id') ? '' : 'selected' }} value=""> --
                                            Seleccione -- </option>
                                        @foreach ($users as $user)
                                        <option {{ old('user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                                            {{ $user->identification . ' | ' . $user->full_name }}
                                        </option>
                                        @endforeach
                                    </x-select2>
                                </div>
                            </div>
                        </div>

                        <div x-show="!isOpen">

                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                    DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input name="identification" value="{{ old('identification') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <x-input name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <x-input name="last_name" value="{{ old('last_name') }}" />
                                </div>
                            </div>

                            @php
                            $today = today()->toDateString();
                            $age = today()
                            ->subYears(7)
                            ->toDateString();
                            @endphp

                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-8">
                                    <x-input type="date" id="birthdate" max="{{ $age }}" name="birthdate" value="{{ old('birthdate') }}" />
                                    <span class="badge text-danger errors-birthdate"></span>
                                </div>
                            </div>

                            <x-input name="canton" type="hidden" value="Alajuela" />


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

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input type="email" name="email" value="{{ old('email') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <x-input name="phone" value="{{ old('phone') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    <x-textarea name="address">
                                        {{ old('address') }}
                                    </x-textarea>
                                </div>
                            </div>

                            <hr>

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



                            <hr>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password" id="password" type="password" />
                                    <span class="badge text-danger errors-password"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                    Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password_confirmation" id="password_confirmation" type="password" />
                                    <span class="badge text-danger errors-password_confirmation"></span>
                                </div>
                            </div>
                        </div>
                </div> --}}


                <!--NUEVOO-->


                {{-- Cédula de Identidad o DIMEX --}}
                <div class="form-group row">
                    <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                        DIMEX</label>
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



                {{-- Fecha de Nacimiento --}}
                @php
                $today = today()->toDateString();
                $age = today()
                ->subYears(7)
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
                        <x-input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                </div>

                {{-- Teléfono --}}
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                    <div class="col-sm-8">
                        <x-input name="phone" value="{{ old('phone') }}" />
                    </div>
                </div>

                {{-- Dirección Exacta --}}
                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                    <div class="col-sm-8">
                        <x-textarea name="address">
                            {{ old('address') }}
                        </x-textarea>
                    </div>
                </div>

                <hr>

                {{-- Género --}}
                <div class="form-group row">
                    <label for="gender" class="col-sm-4 col-form-label">Género</label>
                    <div class="col-sm-8">
                        @foreach ($genders as $gender)
                        <div class="custom-control custom-radio">
                            <input {{ (old('gender') && old('gender') == $gender) || (!old('gender') && $loop->index == 0) ?
                             'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}"
                             value="{{ $gender }}">
                            <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                {{ $gender }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr>



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
                <hr>

                {{-- Categoria --}}
                <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label">Categoria del deporte</label>
                    <div class="col-sm-8">
                        <x-select name="category">
                            <option disabled {{ old('category') ? '' : 'selected' }} value=""> --
                                Seleccione -- </option>
                            @foreach ($categories as $category)
                            <option {{ old('category') == $category ? 'selected' : '' }} value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>

                {{-- Número de Póliza --}}
                <div class="form-group row">
                    <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                    <div class="col-sm-8">
                        <x-input name="policy" value="{{ old('policy') }}" />
                    </div>
                </div>

                {{-- Número de Dictamen Medico --}}
                <div class="form-group row">
                    <label for="medical_opinion" class="col-sm-4 col-form-label">Número de Dictamen
                        Médico</label>
                    <div class="col-sm-8">
                        <x-input name="medical_opinion" value="{{ old('medical_opinion') }}" />
                    </div>
                </div>


                {{-- Disciplina Deportiva --}}
                <div class="form-group row">
                    <label for="sport" class="col-sm-4 col-form-label">Deporte</label>
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

                {{-- Tipo de Sangre --}}
                <div class="form-group row">
                    <label for="blood" class="col-sm-4 col-form-label">Tipo de Sangre</label>
                    <div class="col-sm-8">
                        <x-select name="blood">
                            <option disabled {{ old('blood') ? '' : 'selected' }} value=""> -- Seleccione --
                            </option>
                            @foreach ($bloods as $blood)
                            <option {{ old('blood') == $blood ? 'selected' : '' }} value="{{ $blood }}">{{ $blood }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>

                {{-- Lateralidad --}}
                <div class="form-group row">
                    <label for="laterality" class="col-sm-4 col-form-label">Lateralidad</label>
                    <div class="col-sm-8">
                        @foreach ($lateralities as $laterality)
                        <div class="custom-control custom-radio">
                            <input {{ (old('laterality') && old('laterality') == $laterality) || (!old('laterality') && $loop->index == 0) ? 'checked' : '' }} class="custom-control-input" type="radio" name="laterality" id="laterality-{{ $loop->index }}" value="{{ $laterality }}">
                            <label class="custom-control-label" for="laterality-{{ $loop->index }}">
                                {{ $laterality }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Estado --}}
                <x-input name="condition" type="hidden" value="A" />

                <hr>

                <div x-data="{ isOpen: {{ old('is_younger') ? 'true' : 'false' }} }">

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_younger" id="is_younger" x-model="isOpen">
                        <label class="form-check-label" for="is_younger">
                            ¿El atleta es menor de edad?
                        </label>
                    </div>

                    <div x-show="isOpen">

                        <div class="row">
                            <div class="col mb-3 d-flex justify-content-center">

                                <h3 class="text-center d-block font-weight-bold ">
                                    Información del Responsable
                                </h3>
                            </div>
                        </div>

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification_manager" class="col-sm-4 col-form-label">Cédula de
                                Identidad o DIMEX</label>
                            <div class="col-sm-8">
                                <x-input name="identification_manager" value="{{ old('identification_manager') }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name_manager" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <x-input name="name_manager" value="{{ old('name_manager') }}" />
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="lastname_manager" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <x-input name="lastname_manager" value="{{ old('lastname_manager') }}" />
                            </div>
                        </div>

                        {{-- Teléfono --}}
                        <div class="form-group row">
                            <label for="contact_manager" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <x-input name="contact_manager" value="{{ old('contact_manager') }}" />
                            </div>
                        </div>

                        {{-- Parentezco --}}
                        <div class="form-group row">
                            <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                            <div class="col-sm-8">
                                <x-select name="manager">
                                    <option disabled {{ old('manager') ? '' : 'selected' }} value=""> --
                                        Seleccione -- </option>
                                    @foreach ($relationships as $relationship)
                                    <option {{ old('manager') == $relationship ? 'selected' : '' }} value="{{ $relationship }}">{{ $relationship }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Fotocópia de Cédula --}}
                        <div class="form-group row">
                            <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                            <div class="col-sm-4">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="identification_image">Elija el
                                        archivo </label>
                                    <input name="url" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
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
            }, 'Por favor digite solo valores alfabéticos *', );
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
            if ($("#form_athlete_create").length > 0) {
                $('#form_athlete_create').validate({
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
                        state: {
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
                        policy: {
                            required: true,
                            maxlength: 10,
                            minlength: 1
                        },
                        medical_opinion: {
                            required: true,
                            maxlength: 10,
                            minlength: 1
                        },
                        gender: {
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
                        sport_id: {
                            required: true
                        },
                        blood: {
                            required: true
                        },
                        identification_manager: {
                            required: true,
                            maxlength: 15,
                            minlength: 9
                        },
                        name_manager: {
                            required: true,
                            lettersonly: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        lastname_manager: {
                            required: true,
                            lettersonly: true,
                            minlength: 3,
                            maxlength: 30
                        },
                        contact_manager: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        manager: {
                            required: true
                        },
                        url: {
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
                        state: {
                            required: 'Por favor seleccione un estado *'
                        },
                        district: {
                            required: 'Por favor seleccione su Distrito *'
                        },
                        canton: {
                            required: 'Por favor ingrese la Cantón donde vive *',
                            maxlength: 'La Cantón no puede ser mayor a 30 caracteres *',
                            minlength: 'La Cantón no puede ser menor a 3 caracteres *'
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
                        password: {
                            required: 'Por favor ingrese su contraseña *',
                            minlength: 'La contraseña no puede ser menor a 8 caracteres *',
                            maxlength: 'La contraseña no puede ser mayor a 60 caracteres *'
                        },
                        password_confirmation: {
                            required: 'Por favor ingrese de nuevo su contraseña *',
                            equalTo: 'Por favor introduzca la misma contraseña *'
                        },
                        sport_id: {
                            required: 'Por favor ingrese su instructor *'
                        },
                        blood: {
                            required: 'Por favor ingrese su tipo de sangre *'
                        },
                        identification_manager: {
                            required: 'Por favor ingrese la cédula del responsable *',
                            maxlength: 'Su cédula de identidad no puede ser mayor a 15 caracteres o dígitos *',
                            minlength: 'Su cédula de identidad no puede ser menor a 9 caracteres o dígitos *'
                        },
                        name_manager: {
                            required: 'Por favor ingrese su nombre *',
                            maxlength: 'Su nombre no puede ser mayor a 30 caracteres *',
                            minlength: 'Su nombre no puede ser menor a 3 caracteres *'
                        },
                        lastname_manager: {
                            required: 'Por favor ingrese sus apellidos *',
                            maxlength: 'Sus apellidos no pueden ser mayores a 30 caracteres *',
                            minlength: 'Sus apellidos no pueden ser menores a 3 caracteres *'
                        },
                        contact_manager: {
                            required: 'Por favor ingrese su número telefónico *'
                        },
                        manager: {
                            required: 'Por favor ingrese su número parentezco *'
                        },
                        policy: {
                            required: 'Por favor ingrese la numero de su póliza *',
                            maxlength: 'Su póliza no puede ser mayor a 10 caracteres o dígitos *',
                            minlength: 'Su póliza no puede ser menor a 3 caracteres o dígitos *'
                        },
                        medical_opinion: {
                            required: 'Por favor ingrese el numero de su dictamen medico *',
                            maxlength: 'El numero de su dictamen medico no puede ser mayor a 10 caracteres o dígitos *',
                            minlength: 'El numero de su dictamen medico no puede ser menor a 1 caracteres o dígitos *'
                        },
                        url: {
                            required: 'Por favor ingrese su fotocopia de la cédula *'
                        },
                    }
                });
            }
        });
    </script>
    @endpush

</x-app-layout>

<x-app-layout title="Editar Atleta">

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
                        Editar Atleta
                    </h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('athletes.update', $athlete->id) }}" method="POST" id='form_athlete_edit'>
                        @csrf
                        @method('PUT')
                        @json($errors->all())

                        <div>
                            <div>
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                        DIMEX</label>
                                    <div class="col-sm-8">
                                        <x-input readonly name="identification" value="{{ old('identification') ?? $athlete->user->identification }}" />
                                    </div>
                                </div>

                                {{-- Nombre --}}
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                    <div class="col-sm-8">
                                        <x-input readonly name="name" value="{{ old('name') ?? $athlete->user->name }}" />
                                    </div>
                                </div>

                                {{-- Apellidos --}}
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                    <div class="col-sm-8">
                                        <x-input readonly name="last_name" value="{{ old('last_name') ?? $athlete->user->last_name }}" />
                                    </div>
                                </div>

                                @php
                                $today = today()->toDateString();
                                $age = today()
                                ->subYears(7)
                                ->toDateString();
                                @endphp
                                {{-- Fecha de Nacimiento --}}
                                <div class="form-group row">
                                    <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-8">
                                        <x-input type="date" id="birthdate" max="{{ $age }}" name="birthdate" value="{{ old('birthdate') ?? $athlete->user->birthdate }}" />
                                    </div>
                                </div>

                                {{-- Estado del Atleta --}}
                                <div class="form-group row">
                                    <label for="state" class="col-sm-4 col-form-label">Estado</label>
                                    <div class="col-sm-8">
                                        <x-select name="state">
                                            <option disabled value=""> --
                                                Seleccione --
                                            </option>
                                            @foreach ($states as $state)
                                            <option {{ $athlete->state == $state ? 'selected' : '' }} value="{{ old('state') ?? $state }}">{{ $state }}
                                            </option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Cantón --}}
                                <div class="form-group row">
                                    <label for="canton" class="col-sm-4 col-form-label">Cantón</label>
                                    <div class="col-sm-8">
                                        <x-input readonly name="canton" value="{{ old('canton') ?? $athlete->user->canton }}" />
                                    </div>
                                </div>

                                {{-- Distrito --}}
                                <div class="form-group row">
                                    <label for="district" class="col-sm-4 col-form-label">Distrito</label>
                                    <div class="col-sm-8">
                                        <x-select name="district">
                                            <option disabled value=""> -- Seleccione -- </option>
                                            @foreach ($districts as $district)
                                            <option {{ $athlete->user->district == $district ? 'selected' : '' }} value="{{ old('district') ?? $district }}">{{ $district }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                <hr>

                                {{-- Correo Electrónico --}}
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-8">
                                        <x-input type="email" name="email" value="{{ old('email') ?? $athlete->user->email }}" />
                                    </div>
                                </div>


                                {{-- Teléfono --}}
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        <x-input name="phone" value="{{ old('phone') ?? $athlete->user->phone }}" />
                                    </div>
                                </div>

                                {{-- Dirección Exacta --}}
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="address">
                                            {{ old('address') ?? $athlete->user->address }}
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
                                            <input {{ $athlete->user->gender && $athlete->user->gender == $gender ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender"
                                            id="gender-{{ $loop->index }}" value="{{ old('gender') ?? $athlete->user->gender }}">
                                            <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                                {{ $gender }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Categoria --}}
                                <div class="form-group row">
                                    <label for="category" class="col-sm-4 col-form-label">Categoria</label>
                                    <div class="col-sm-8">
                                        <x-select name="category">
                                            <option disabled value=""> -- Seleccione -- </option>
                                            @foreach ($categories as $category)
                                            <option {{ $athlete->category == $category ? 'selected' : '' }} value="{{ old('category') ?? $category }}">{{ $category }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Número de Póliza --}}
                                <div class="form-group row">
                                    <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                                    <div class="col-sm-8">
                                        <x-input name="policy" value="{{ old('policy') ?? $athlete->policy }}" />
                                    </div>
                                </div>


                                {{-- Número de Dictamen Medico --}}
                                <div class="form-group row">
                                    <label for="medical_opinion" class="col-sm-4 col-form-label">Número de
                                        Dictamen Médico</label>
                                    <div class="col-sm-8">
                                        <x-input name="medical_opinion" value="{{ old('medical_opinion') ?? $athlete->medical_opinion }}" />
                                    </div>
                                </div>
                                <hr>
                                <div x-data="{ isOpen: {{ old('is_edit') ? 'true' : 'false' }} }">

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="is_edit" id="is_edit" x-model="isOpen">
                                        <label class="form-check-label" for="is_edit">
                                            Editar Contraseña
                                        </label>
                                    </div>

                                    <div x-show="isOpen">
                                        {{-- Contraseña --}}
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
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
                                    </div>

                                </div>
                            </div>

                            <hr>

                            {{-- Disciplina Deportiva --}}

                            <div class="form-group row">
                                <label for="sport" class="col-sm-4 col-form-label">Deporte</label>
                                <div class="col-sm-8">
                                    <x-select name="sport_id">
                                        <option disabled value=""> -- Seleccione -- </option>
                                        @foreach ($sports as $sport)
                                        <option {{ $athlete->sport_id == $sport->id ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            {{-- Tipo de Sangre --}}
                            <div class="form-group row">
                                <label for="blood" class="col-sm-4 col-form-label">Tipo de Sangre</label>
                                <div class="col-sm-8">
                                    <x-select name="blood">
                                        <option disabled value=""> -- Seleccione -- </option>
                                        @foreach ($bloods as $blood)
                                        <option {{ $athlete->blood == $blood ? 'selected' : '' }} value="{{ old('blood') ?? $blood }}">{{ $blood }}</option>
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
                                        <input {{ $athlete->laterality == $laterality ? 'checked' : '' }} class="custom-control-input" type="radio" name="laterality" id="laterality-{{ $loop->index }}" value="{{ old('laterality') ?? $laterality }}">
                                        <label class="custom-control-label" for="laterality-{{ $loop->index }}">
                                            {{ $laterality }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <x-input name="condition" type="hidden" value="A" />

                            <hr>

                            <div x-data="{ isOpen: {{ $athlete->identification_manager ? 'true' : 'false' }} }">

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
                                            <x-input name="identification_manager" value="{{ old('identification_manager') ?? $athlete->identification_manager }}" />
                                        </div>
                                    </div>

                                    {{-- Nombre --}}
                                    <div class="form-group row">
                                        <label for="name_manager" class="col-sm-4 col-form-label">Nombre</label>
                                        <div class="col-sm-8">
                                            <x-input name="name_manager" value="{{ old('name_manager') ?? $athlete->name_manager }}" />
                                        </div>
                                    </div>

                                    {{-- Apellidos --}}
                                    <div class="form-group row">
                                        <label for="lastname_manager" class="col-sm-4 col-form-label">Apellidos</label>
                                        <div class="col-sm-8">
                                            <x-input name="lastname_manager" value="{{ old('lastname_manager') ?? $athlete->lastname_manager }}" />
                                        </div>
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="form-group row">
                                        <label for="contact_manager" class="col-sm-4 col-form-label">Teléfono</label>
                                        <div class="col-sm-8">
                                            <x-input name="contact_manager" value="{{ old('contact_manager') ?? $athlete->contact_manager }}" />
                                        </div>
                                    </div>

                                    {{-- Parentezco --}}
                                    <div class="form-group row">
                                        <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                                        <div class="col-sm-8">
                                            <x-select name="manager">
                                                <option disabled {{ $athlete->manager ? '' : 'selected' }} value="">
                                                    -- Seleccione -- </option>
                                                @foreach ($relationships as $relationship)
                                                <option {{ $athlete->manager == $relationship ? 'selected' : '' }} value="{{ old('relationship') ?? $relationship }}">
                                                    {{ $relationship }}
                                                </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    {{-- Fotocópia de Cédula --}}
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                        <div class="col-sm-4">
                                            <div class="input-group mb-3">
                                                <label for="pdf" class="custom-file-label">Fotocopia de Cédula</label>
                                                <x-input name="pdf" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01" />
                                            </div>
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
            if ($("#form_athlete_edit").length > 0) {
                $('#form_athlete_edit').validate({
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
                        pdf: {
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
                        pdf: {
                            required: 'Por favor ingrese su fotocopia de la cédula *'
                        },
                    }
                });
            }
        });
    </script>
    @endpush
</x-app-layout>

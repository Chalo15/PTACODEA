<x-app-layout title="Editar Fisioterapia">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('physios.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Editar Documento
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.update', $physio->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Fecha de registro --}}
                        @php
                            $today = today()->toDateString();
                            /*$lastWeek = today()->subDays(7)->toDateString();
                             $nextWeek = today()->addDay(7)->toDateString();*/
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input readonly name="date" type="date" {{-- min="{{ $lastWeek }}" max="{{ $nextWeek }}" --}}
                                    value="{{ old('date') ?? $physio->date }}" />
                            </div>
                        </div>

                        {{-- Hora de registro --}}
                        @php
                            $hour = now()->toTimeString();
                            /*$today = today()->toDateString();
                                                    $lastWeek = today()->subDays(7)->toDateString();
                                                    $nextWeek = today()->addDay(7)->toDateString();*/
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input readonly name="time" type="time" {{-- min="{{ $lastWeek }}" max="{{ $nextWeek }}" --}}
                                    value="{{ old('timr') ?? $physio->time }}" />
                            </div>
                        </div>

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-input name="athlete_id" readonly value="{{ $physio->athlete->user->full_name }}">
                                </x-input>
                            </div>
                        </div>

                        {{-- SPH --}}
                        <div class="form-group row">
                            <label for="sph" class="col-sm-4 col-form-label">SPH</label>
                            <div class="col-sm-8">
                                <x-textarea name="sph" value="{{ old('sph') ?? $physio->sph }}" />
                            </div>
                        </div>

                        {{-- APP --}}
                        <div class="form-group row">
                            <label for="app" class="col-sm-4 col-form-label">APP</label>
                            <div class="col-sm-8">
                                <x-textarea name="app" value="{{ old('app') ?? $physio->app }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="treatment" class="col-sm-4 col-form-label">Tratamiento</label>
                            <div class="col-sm-8">
                                <x-textarea name="treatment" value="{{ old('treatment') ?? $physio->treatment }}" />
                            </div>
                        </div>

                        <div x-data="{ isOpen: {{ $physio->surgeries ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_surgeries" id="is_surgeries"
                                    x-model="isOpen">
                                <label class="form-check-label" for="is_surgeries">
                                    ¿El atleta tiene alguna cirugía?
                                </label>
                            </div>

                            <div x-show="isOpen">
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="surgeries" class="col-sm-4 col-form-label">Detalle del
                                        tratamiento</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="surgeries"
                                            value="{{ old('surgeries') ?? $physio->surgeries }}" />
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div x-data="{ isOpen: {{ $physio->fractures ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_fractures" id="is_fractures"
                                    x-model="isOpen">
                                <label class="form-check-label" for="is_fractures">
                                    ¿El atleta tiene alguna fractura?
                                </label>
                            </div>

                            <div x-show="isOpen">
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="fractures" class="col-sm-4 col-form-label">Detalle de la
                                        fractura</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="fractures"
                                            value="{{ old('fractures') ?? $physio->fractures }}" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- hora de inicio --}}
                        <div class="form-group row">
                            <label for="session_start" class="col-sm-4 col-form-label">Hora de inicio</label>
                            <div class="col-sm-8">
                                <x-input name="session_start" type="time"
                                    value="{{ old('session_start') ?? $physio->session_start }}" />
                            </div>
                        </div>


                        {{-- hora de fin --}}
                        <div class="form-group row">
                            <label for="session_end" class="col-sm-4 col-form-label">Hora de fin</label>
                            <div class="col-sm-8">
                                <x-input name="session_end" type="time"
                                    value="{{ old('session_end') ?? $physio->session_end }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="inability" class="col-sm-4 col-form-label">Fecha de inactividad</label>
                            <div class="col-sm-8">
                                <x-input name="inability" type="date" min="{{ date('Y-m-d') }}"
                                    value="{{ old('inability') ?? $physio->inability }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="count_session" class="col-sm-4 col-form-label">Cantidad de sesiones</label>
                            <div class="col-sm-8">
                                <x-input name="count_session" type="number" min="1"
                                    value="{{ old('count_session') ?? $physio->count_session }}" />
                            </div>
                        </div>


                        {{-- Tipo de lesion --}}
                        <div class="form-group row">
                            <label for="severity" class="col-sm-4 col-form-label">Tipo de lesión</label>
                            <div class="col-sm-8">
                                <x-select name="severity">
                                    <option disabled {{ $physio->severity ? '' : 'selected' }} value=""> --
                                        Seleccione
                                        -- </option>
                                    @foreach ($severities as $severity)
                                        <option {{ old('severity') == $severity ? 'selected' : '' }}
                                            value="{{ old('severity') ?? $severity }}">{{ $severity }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Datos extra</label>
                            <div class="col-sm-8">
                                <x-editor name="details" value="{!! $physio->details !!}" />
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
            $(document).ready(function() {
                //Metodo para validar la cédula
                jQuery.validator.addMethod("idnumber", function(value, element) {
                    if (/^\d{2}-?\d{1}-?\d{1}$/g.test(value)) {
                        return true;
                    } else {
                        return false;
                    };
                }, "La cédula debe tener 9 dígitos *");
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
                    return this.optional(element) || /^[a-z," ","ñ"]+$/i.test(value);
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
                if ($("#form_users_edit").length > 0) {
                    $('#form_users_edit').validate({
                        rules: {
                            birthdate: {
                                required: true
                            },
                            province: {
                                required: true
                            },
                            city: {
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
                            pdf: {
                                required: true
                            },
                            sport_id: {
                                required: true
                            },
                        },
                        messages: {
                            birthdate: {
                                required: 'Por favor ingrese su fecha de nacimiento *'
                            },
                            province: {
                                required: 'Por favor ingrese su provincia *'
                            },
                            city: {
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
                            pdf: {
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

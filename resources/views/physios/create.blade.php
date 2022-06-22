<x-app-layout title="Nueva Fisioterapia">

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
                    Nueva Fisioterapia
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.store') }}" method="POST" id='form_physios_create'>

                        @csrf


                        @php
                        $today = today()->toDateString();
                        @endphp

                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input readonly name="date" id="date" type="date" min="{{ date('Y-m-d') }}" value="{{ $today }}" />
                            </div>
                        </div>


                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select2 name="athlete_id" id="athlete_id">
                                    <option disabled {{ old('athlete_id') ? '' : 'selected' }} value=""> -- Seleccione
                                        -- </option>
                                    @foreach ($athletes as $athlete)
                                    <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }} value="{{ $athlete->id }}">
                                        {{ $athlete->user->identification . ' | ' . $athlete->user->name . ' ' . $athlete->user->last_name }}
                                    </option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>

                        {{-- APH --}}
                        <div class="form-group row">
                            <label for="aph" class="col-sm-4 col-form-label">APH</label>
                            <div class="col-sm-8">
                                <x-textarea id="aph" name="aph" value="{{ old('aph') }}" />
                            </div>
                        </div>

                        {{-- APP --}}
                        <div class="form-group row">
                            <label for="app" class="col-sm-4 col-form-label">APP</label>
                            <div class="col-sm-8">
                                <x-textarea id="app" name="app" value="{{ old('app') }}" />
                            </div>
                        </div>

                        {{-- Tratamiento --}}

                        <div class="form-group row">
                            <label for="treatment" class="col-sm-4 col-form-label">Tratamiento</label>
                            <div class="col-sm-8">
                                <x-textarea id="treatment" name="treatment" value="{{ old('treatment') }}" />
                            </div>
                        </div>
                        {{-- Cirugias --}}
                        <div x-data="{ isOpen: {{ old('is_surgeries') ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_surgeries" id="is_surgeries" x-model="isOpen">
                                <label class="form-check-label" for="is_surgeries">
                                    ¿El atleta ha tenido alguna cirugía?
                                </label>
                            </div>

                            <div x-show="isOpen">

                                {{-- Lesiones --}}

                                {{-- Tratamiento --}}

                                <div class="form-group row">
                                    <label for="surgeries" class="col-sm-4 col-form-label">Detalle del
                                        tratamiento</label>
                                    <div class="col-sm-8">
                                        <x-textarea id="sugeries" name="surgeries" value="{{ old('surgeries') }}" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Fracturas --}}
                        <div x-data="{ isOpen: {{ old('is_fractures') ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_fractures" id="is_fractures" x-model="isOpen">
                                <label class="form-check-label" for="is_fractures">
                                    ¿El atleta tiene alguna fractura?
                                </label>
                            </div>

                            <div x-show="isOpen">

                                {{-- Fracturas --}}

                                {{-- Detalle Fractura --}}

                                <div class="form-group row">
                                    <label for="fractures" class="col-sm-4 col-form-label">Detalle de la
                                        fractura</label>
                                    <div class="col-sm-8">
                                        <x-textarea id="fractures" name="fractures" value="{{ old('fractures') }}" />
                                    </div>
                                </div>
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

                            <label for="session_start" class="col-sm-4 col-form-label">Hora</label>
                            <div class="col-sm-8">
                                <x-input readonly id="session_start" name="session_start" type="time" {{-- min="{{ $lastWeek }}" max="{{ $nextWeek }}" --}} value="{{ $hour }}" />
                            </div>
                        </div>


                        {{-- hora de fin --}}
                        <div class="form-group row">
                            <label for="session_end" class="col-sm-4 col-form-label">Hora de fin</label>
                            <div class="col-sm-8">
                                <x-input id="session_end" name="session_end" type="time" value="{{ old('session_end') }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="inability" class="col-sm-4 col-form-label">Fecha de inactividad</label>
                            <div class="col-sm-8">
                                <x-input id="inability" name="inability" type="date" min="{{ date('Y-m-d') }}" value="{{ old('inability') }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="count_session" class="col-sm-4 col-form-label">Cantidad de sesiones</label>
                            <div class="col-sm-8">
                                <x-input id="count_session" name="count_session" min="1" value="{{ old('count_session') }}" />
                            </div>
                        </div>


                        {{-- Tipo de lesion --}}
                        <div class="form-group row">
                            <label for="severity" class="col-sm-4 col-form-label">Tipo de lesión</label>
                            <div class="col-sm-8">
                                <x-select id="severity" name="severity">
                                    <option disabled {{ old('severity') ? '' : 'selected' }} value=""> -- Seleccione
                                        -- </option>
                                    @foreach ($severities as $severity)
                                    <option {{ old('severity') == $severity ? 'selected' : '' }} value="{{ $severity }}">{{ $severity }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Datos extra</label>
                            <div class="col-sm-8">
                                <x-editor id="details" name="details" value="{!! old('details') !!}" />
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
            //Metodo para validar la hora
            jQuery.validator.addMethod("horahhmm", function(value, element) {
                var res = false;
                // Formato hh:mm
                res = this.optional(element) || /^\d{2}[:]\d{2}$/.test(value);
                var hora = value.split(':');
                var hh = parseInt(hora[0], 10);
                var mm = parseInt(hora[1], 10);
                if (hh < 0 || hh > 23) res = false;
                if (mm < 0 || mm > 59) res = false;
                return res;
            }, "La hora indicada no es válida");
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
            jQuery.validator.addMethod("passwordCheck"
                , function(value, element, param) {
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
                }
                , "Por motivos de seguridad, asegúrese de que su contraseña contenga letras mayúsculas, minúsculas y dígitos *"
            );
            //Validaciones del formulario
            if ($("#form_physios_create").length > 0) {
                $('#form_physios_create').validate({
                    rules: {
                        athlete_id: {
                            required: true
                        }
                        , date: {
                            required: true
                        }
                        , aph: {
                            required: true
                        }
                        , app: {
                            required: true
                        }
                        , treatment: {
                            required: true
                        }
                        , surgeries: {
                            required: true
                        }
                        , fractures: {
                            required: true
                        },

                        session_start: {
                            required: true
                        }
                        , session_end: {
                            required: true
                        }
                        , inability: {
                            required: true
                        }
                        , count_session: {
                            required: true
                            , numbersonly: true
                        }
                        , severity: {
                            required: true
                        }
                    , }
                    , messages: {
                        athlete_id: {
                            required: 'Por favor seleccione un atleta *'
                        }
                        , aph: {
                            required: 'Por favor ingrese su aph *'
                        }
                        , app: {
                            required: 'Por favor ingrese su APP *'
                        }
                        , treatment: {
                            required: 'Por favor ingrese el detalle del tratamiento *'
                        }
                        , surgeries: {
                            required: 'Por favor ingrese el detalle de la cirujía *'
                        }
                        , fractures: {
                            required: 'Por favor ingrese el detalle de la fractura *'
                        }
                        , session_end: {
                            required: 'Por favor ingrese la hora de fin *'
                        }
                        , inability: {
                            required: 'Por favor ingrese su dirección completa *'
                        }
                        , count_session: {
                            required: 'Por favor ingrese la cantidad de secciones *'
                        }
                        , severity: {
                            required: 'Por favor ingrese el tipo de lesión*'
                        }
                    , }
                });
            }
        });

    </script>
    @endpush

</x-app-layout>

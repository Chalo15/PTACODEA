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
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha de Registro</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{ date('Y-m-d') }}"
                                    readonly value="{{ old('date') ?? $physio->date->isoFormat('YYYY-MM-DD') }}" />
                            </div>
                        </div>

                        {{--Hora de Inicio --}}
                        <div class="form-group row">

                            <label for="session_start" class="col-sm-4 col-form-label">Hora de Inicio</label>
                            <div class="col-sm-8">
                                <x-input name="session_start" readonly value="{{ old('session_start') ?? $physio->session_start }}" />
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

                        {{-- APH --}}
                        <div class="form-group row">
                            <label for="aph" class="col-sm-4 col-form-label">APH</label>
                            <div class="col-sm-8">
                                <x-textarea name="aph" value="{{ old('aph') ?? $physio->aph }}" />
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
                                {{-- Detalle Tratamiento --}}
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
                                {{-- Detalle Fractura --}}
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


                        {{-- Hora de fin --}}
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
                if ($("#form_physios_create").length > 0) {
                    $('#form_physios_create').validate({
                        rules: {
                            athlete_id: {
                                required: true
                            },
                            aph: {
                                required: true
                            },
                            app: {
                                required: true
                            },
                            treatment: {
                                required: true
                            },
                            surgeries: {
                                required: true
                            },
                            fractures: {
                                required: true
                            },
                            session_end: {
                                required: true
                            },
                            inability: {
                                required: true
                            },
                            count_session: {
                                required: true,
                                numbersonl: true
                            },
                            severity: {
                                required: true
                            },
                        },
                        messages: {
                            athlete_id: {
                                required: 'Por favor seleccione un atleta *'
                            },
                            aph: {
                                required: 'Por favor ingrese su aph *'
                            },
                            app: {
                                required: 'Por favor ingrese su APP *'
                            },
                            treatment: {
                                required: 'Por favor ingrese el detalle del tratamiento *'
                            },
                            surgeries: {
                                required: 'Por favor ingrese el detalle de la cirujía *'
                            },
                            fractures: {
                                required: 'Por favor ingrese el detalle de la fractura *'
                            },
                            session_end: {
                                required: 'Por favor ingrese la hora de fin *'
                            },
                            inability: {
                                required: 'Por favor ingrese su dirección completa *'
                            },
                            count_session: {
                                required: 'Por favor ingrese la cantidad de secciones *'
                            },
                            severity: {
                                required: 'Por favor ingrese el tipo de lesión*'
                            },
                        }
                    });
                }
            });
        </script>
    @endpush


</x-app-layout>

<x-app-layout title="Nuevo Entrenamiento">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('trainings.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Nuevo Entrenamiento
                </div>

                <div class="card-body">
                    <form id="form_create_trainings" action="{{ route('trainings.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select2 id="athlete_id" name="athlete_id">
                                    <option disabled {{ old('athlete_id') ? '' : 'selected' }} value=""> -- Seleccione
                                        -- </option>
                                    @foreach ($athletes as $athlete)
                                    <<<<<<< HEAD <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }} value="{{ $athlete->id }}">
                                        {{ $athlete->user->identification . ' | ' . $athlete->user->name . ' ' . $athlete->user->last_name }}
                                        </option>
                                        =======
                                        <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }} value="{{ $athlete->id }}">
                                            {{ $athlete->user->identification . ' | ' . $athlete->user->name . ' ' . $athlete->user->last_name }}
                                        </option>
                                        >>>>>>> origin/Gonzalo
                                        @endforeach
                                </x-select2>
                            </div>
                        </div>

                        {{-- Fecha de registro --}}
                        {{-- Fecha de Toma Datos --}}
                        @php
                        $today = today()->toDateString();
                        @endphp
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input readonly type="date" name="date" value="{{ $today }}" />
                            </div>
                        </div>

                        {{-- type_training --}}
                        <div class="form-group row">
                            <label for="type_training" class="col-sm-4 col-form-label">Tipo de Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input id="type_training" name="type_training" value="{{ old('type_training') }}" />
                            </div>
                        </div>

                        {{-- Calificacion --}}
                        <div class="form-group row">
                            <label for="calification" class="col-sm-4 col-form-label">Calificacion</label>
                            <div class="col-sm-8">
                                <x-input id="calification" name="calification" value="{{ old('calification') }}" />
                            </div>
                        </div>

                        {{-- Tiempo --}}
                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label">Duración del Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input id="time" name="time" value="{{ old('time') }}" type="time" />
                            </div>
                        </div>

                        {{-- Nivel --}}
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Nivel</label>
                            <div class="col-sm-8">
                                <x-input id="level" name="level" value="{{ old('level') }}" />
                            </div>
                        </div>

                        {{-- Aspectos a mejorar --}}
                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos por Mejorar</label>
                            <div class="col-sm-8">
                                <x-input id="get_better" name="get_better" value="{{ old('get_better') }}" />
                            </div>
                        </div>

                        {{-- Plan de Mejora --}}
                        <div class="form-group row">
                            <label for="planification" class="col-sm-4 col-form-label">Planificación</label>
                            <div class="col-sm-8">
                                <x-input id="planification" name="planification" value="{{ old('planification') }}" />
                            </div>
                        </div>

                        {{-- Lesion --}}
                        <div class="form-group row">
                            <label for="lesion" class="col-sm-4 col-form-label">Lesiones Durante el
                                Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input id="lesion" name="lesion" value="{{ old('lesion') }}" />
                            </div>
                        </div>


                        {{-- Detalles --}}
                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Otros Detalles</label>
                            <div class="col-sm-8">
                                <x-editor name="details" value="{!! old('details') !!}" />
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
            //Método que valida solo numeros
            jQuery.validator.addMethod("numbersonly", function(value, element) {
                return this.optional(element) || /^[0-9,":"]+$/i.test(value);
            }, 'Por favor digite solo valores numéricos y números naturales *', );
            //Validaciones del formulario
            if ($("#form_create_trainings").length > 0) {
                $('#form_create_trainings').validate({
                    rules: {
                        date: {
                            required: true
                        }
                        , type_training: {
                            required: true
                        }
                        , calification: {
                            required: true
                        }
                        , time: {
                            required: true
                            , numbersonly: true
                        }
                        , level: {
                            required: true
                        }
                        , get_better: {
                            required: true
                        }
                        , planification: {
                            required: true
                        }
                        , details: {
                            required: true
                        }
                    , },

                    messages: {
                        date: {
                            required: 'Por favor seleccione una fecha *'
                        }
                        , type_training: {
                            required: 'Por favor ingrese el tipo de entrenamiento *'
                        }
                        , calification: {
                            required: 'Por favor ingrese la calificación *'
                        }
                        , time: {
                            required: 'Por favor la duración del entrenamiento *'
                        }
                        , level: {
                            required: 'Por favor ingrese el nivel *'
                        }
                        , get_better: {
                            required: 'Por favor ingrese los aspectos a mejorar *'
                        }
                        , planification: {
                            required: 'Por favor ingrese la planificación *'
                        }
                        , lesion: {
                            required: 'Por favor ingrese la lesión que presenta *'
                        }
                    , }
                });
            }
        });

    </script>
    @endpush


</x-app-layout>

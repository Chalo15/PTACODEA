<x-app-layout title="Editar Entrenamiento">

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
                    Editar Entrenamiento
                </div>

                <div class="card-body">
                        <form id="edit_create_trainings" action="{{ route('trainings.update', $training->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Atleta --}}
                            <div class="form-group row">
                                <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                                <div class="col-sm-8">
                                    <x-input name="athlete_id" readonly value="{{ $training->athlete->id }}">
                                    </x-input>
                                </div>
                            </div>


                            @php
                            $today = today()->toDateString();
                            $lastWeek = today()
                            ->subDays(7)
                            ->toDateString();
                            $nextWeek = today()
                            ->addDay(7)
                            ->toDateString();
                            @endphp

                            <div class="form-group row">

                                <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                                <div class="col-sm-8">
                                    <x-input name="date" type="date" min="{{ $lastWeek }}" max="{{ $nextWeek }}" value="{{ old('date') ?? $training->date }}" />
                                </div>
                            </div>

                            {{-- type_training --}}
                            <div class="form-group row">
                                <label for="type_training" class="col-sm-4 col-form-label">Tipo de Entrenamiento</label>
                                <div class="col-sm-8">
                                    <x-input name="type_training" value="{{ old('type_training') ?? $training->type_training }}" />
                                </div>
                            </div>

                            {{-- calification --}}
                            <div class="form-group row">
                                <label for="calification" class="col-sm-4 col-form-label">Calificación</label>
                                <div class="col-sm-8">
                                    <x-input name="calification" value="{{ old('calification') ?? $training->calification }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-sm-4 col-form-label">Duración del Entrenamiento</label>
                                <div class="col-sm-8">
                                    <x-textarea name="time" value="{{ old('time') ?? $training->time }}" />
                                </div>
                            </div>

                            {{-- Nivel --}}
                            <div class="form-group row">
                                <label for="level" class="col-sm-4 col-form-label">Nivel</label>
                                <div class="col-sm-8">
                                    <x-input name="level" value="{{ old('level') ?? $training->level }}" />
                                </div>
                            </div>

                            {{-- Aspectos a Mejorar --}}
                            <div class="form-group row">
                                <label for="get_better" class="col-sm-4 col-form-label">Aspectos a Mejorar</label>
                                <div class="col-sm-8">
                                    <x-input name="get_better" value="{{ old('get_better') ?? $training->get_better }}" />
                                </div>
                            </div>

                            {{-- Planificacion --}}
                            <div class="form-group row">
                                <label for="planification" class="col-sm-4 col-form-label">Planificación</label>
                                <div class="col-sm-8">
                                    <x-input name="planification" value="{{ old('planification') ?? $training->planification }}" />
                                </div>
                            </div>


                            {{-- Lesion --}}
                            <div class="form-group row">
                                <label for="lesion" class="col-sm-4 col-form-label">Lesión</label>
                                <div class="col-sm-8">
                                    <x-input name="lesion" value="{{ old('lesion') ?? $training->lesion }}" />
                                </div>
                            </div>

                            {{-- Detalles --}}
                            <div class="form-group row">
                                <label for="details" class="col-sm-4 col-form-label">Datos extra</label>
                                <div class="col-sm-8">
                                    <x-editor name="details" value="{!! $training->details !!}" />
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
            if ($("#edit_create_trainings").length > 0) {
                $('#edit_create_trainings').validate({
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
                        , lesion: {
                            required: true
                        }
                        , details: {
                            required: true
                        }
                    , }
                    , messages: {
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

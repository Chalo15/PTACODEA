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
                    <form action="{{ route('trainings.store') }}" method="POST">
                        @csrf

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select2 name="athlete_id">
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

                        {{-- Fecha de registro --}}
                        @php
                        $today = today()->toDateString();
                        $lastWeek = today()->subDays(7)->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();
                        @endphp

                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{ $lastWeek }}" max="{{ $nextWeek }}" value="{{ $today }}" />
                            </div>
                        </div>

                        {{-- type_training --}}
                        <div class="form-group row">
                            <label for="type_training" class="col-sm-4 col-form-label">Tipo de Entrenamienro</label>
                            <div class="col-sm-8">
                                <x-input name="type_training" value="{{ old('type_training') }}" />
                            </div>
                        </div>

                        {{-- calification --}}
                        <div class="form-group row">
                            <label for="calification" class="col-sm-4 col-form-label">Calificacion</label>
                            <div class="col-sm-8">
                                <x-input name="calification" value="{{ old('calification') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label">Duración del Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input name="time" value="{{ old('time') }}" />
                            </div>
                        </div>

                        {{-- Nivel --}}
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Nivel</label>
                            <div class="col-sm-8">
                                <x-input name="level" value="{{ old('level') }}" />
                            </div>
                        </div>

                        {{-- Aspectos a mejorar --}}
                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos por Mejorar</label>
                            <div class="col-sm-8">
                                <x-input name="get_better" value="{{ old('get_better') }}" />
                            </div>
                        </div>

                        {{-- Plan de Mejora --}}
                        <div class="form-group row">
                            <label for="planification" class="col-sm-4 col-form-label">Planificación</label>
                            <div class="col-sm-8">
                                <x-input name="planification" value="{{ old('planification') }}" />
                            </div>
                        </div>

                        {{-- Lesion --}}
                        <div class="form-group row">
                            <label for="lesion" class="col-sm-4 col-form-label">Lesiones Durante el
                                Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input name="lesion" value="{{ old('lesion') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Datos extra</label>
                            <div class="col-sm-8">
                                <x-editor name="details" value="{!! $athlete->sport->ckeditor !!}" />
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


</x-app-layout>

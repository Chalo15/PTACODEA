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
                    <form action="{{ route('trainings.update', $training->id) }}" method="POST">
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
                        $lastWeek = today()->subDays(7)->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();
                        @endphp

                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{ $lastWeek }}" max="{{ $nextWeek }}" value="{{old('date') ?? $training->date }}" />
                            </div>
                        </div>

                        {{-- type_training --}}
                        <div class="form-group row">
                            <label for="type_training" class="col-sm-4 col-form-label">Tipo de Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-input name="type_training" value="{{old('type_training') ?? $training->type_training }}" />
                            </div>
                        </div>

                        {{-- calification --}}
                        <div class="form-group row">
                            <label for="calification" class="col-sm-4 col-form-label">Calificación</label>
                            <div class="col-sm-8">
                                <x-input name="calification" value="{{old('calification') ?? $training->calification }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label">Duración del Entrenamiento</label>
                            <div class="col-sm-8">
                                <x-textarea name="time" value="{{ old('time') ??$training->time }}" />
                            </div>
                        </div>

                        {{-- Nivel --}}
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Nivel</label>
                            <div class="col-sm-8">
                                <x-input name="level" value="{{old('level') ?? $training->level }}" />
                            </div>
                        </div>

                        {{-- Aspectos a Mejorar --}}
                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos a Mejorar</label>
                            <div class="col-sm-8">
                                <x-input name="get_better" value="{{old('get_better') ?? $training->get_better }}" />
                            </div>
                        </div>

                        {{-- Planificacion --}}
                        <div class="form-group row">
                            <label for="planification" class="col-sm-4 col-form-label">Planificación</label>
                            <div class="col-sm-8">
                                <x-input name="planification" value="{{old('planification') ?? $training->planification }}" />
                            </div>
                        </div>


                        {{-- Lesion --}}
                        <div class="form-group row">
                            <label for="lesion" class="col-sm-4 col-form-label">Lesión</label>
                            <div class="col-sm-8">
                                <x-input name="lesion" value="{{old('lesion') ?? $training->lesion }}" />
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


</x-app-layout>

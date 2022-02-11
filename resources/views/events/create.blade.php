<x-app-layout title="Generar Cita">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('events.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('events.store') }}" method="POST">
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
                        {{--Motivo de la cita--}}
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Motivo de la cita</label>
                            <div class="col-sm-8">
                                <x-input name="title" value="{{ old('title') }}" />
                            </div>
                        </div>

                        {{--Descripcion de la cita--}}
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Descripcion de la cita</label>
                            <div class="col-sm-8">
                                <x-textarea name="description">
                                    {{ old('description') }}
                                </x-textarea>
                            </div>
                        </div>

                        {{--Fecha de la cita--}}
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha de la Cita</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="date" value="{{ old('date') }}" />
                            </div>
                        </div>

                        {{--Hora de Inicio de la cita--}}
                        <div class="form-group row">
                            <label for="start" class="col-sm-4 col-form-label">Inicio</label>
                            <div class="col-sm-8">
                                <x-input type="time" name="start" value="{{ old('start') }}" />
                            </div>
                        </div>

                        {{--Hora de Finalizacion de la cita--}}
                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Finalizacion</label>
                            <div class="col-sm-8">
                                <x-input type="time" name="end" value="{{ old('end') }}" />
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

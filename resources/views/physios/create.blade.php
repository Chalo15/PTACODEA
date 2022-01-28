<x-app-layout title="Crear Documento">

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
                    Crear Documento
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.store') }}" method="POST">
                        @csrf

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select2 name="athlete_id">
                                    <option disabled {{ old('athlete_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($athletes as $athlete)
                                    <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }} value="{{ $athlete->id }}">{{ $athlete->user->identification . ' | ' . $athlete->user->name . " " . $athlete->user->last_name }}</option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>



                        {{-- Fecha de registr --}}
                        @php

                        $today = today()->toDateString();
                        $lastWeek = today()->subDays(7)->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();

                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{$lastWeek}}" max="{{$nextWeek}}" value="{{$today}}" />
                            </div>
                        </div>

                        {{-- SPH --}}
                        <div class="form-group row">
                            <label for="sph" class="col-sm-4 col-form-label">SPH</label>
                            <div class="col-sm-8">
                                <x-textarea name="sph" value="{{ old('sph') }}" />
                            </div>
                        </div>

                        {{-- APP --}}
                        <div class="form-group row">
                            <label for="app" class="col-sm-4 col-form-label">APP</label>
                            <div class="col-sm-8">
                                <x-textarea name="app" value="{{ old('app') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="treatment" class="col-sm-4 col-form-label">Tratamiento</label>
                            <div class="col-sm-8">
                                <x-textarea name="treatment" value="{{ old('treatment') }}" />
                            </div>
                        </div>

                        <div x-data="{ isOpen: {{ old('is_surgeries') ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_surgeries" id="is_surgeries" x-model="isOpen">
                                <label class="form-check-label" for="is_surgeries">
                                    ¿El atleta tiene alguna cirugía?
                                </label>
                            </div>

                            <div x-show="isOpen">
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="surgeries" class="col-sm-4 col-form-label">Detalle del tratamiento</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="surgeries" value="{{ old('surgeries') }}" />
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div x-data="{ isOpen: {{ old('is_fractures') ? 'true' : 'false' }} }">

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_fractures" id="is_fractures" x-model="isOpen">
                                <label class="form-check-label" for="is_fractures">
                                    ¿El atleta tiene alguna fractura?
                                </label>
                            </div>

                            <div x-show="isOpen">
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="fractures" class="col-sm-4 col-form-label">Detalle de la fractura</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="fractures" value="{{ old('fractures') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- hora de inicio --}}
                        <div class="form-group row">
                            <label for="session_start" class="col-sm-4 col-form-label">Hora de inicio</label>
                            <div class="col-sm-8">
                                <x-input name="session_start" type="time" value="{{ old('session_start') }}" />
                            </div>
                        </div>


                        {{-- hora de fin --}}
                        <div class="form-group row">
                            <label for="session_end" class="col-sm-4 col-form-label">Hora de fin</label>
                            <div class="col-sm-8">
                                <x-input name="session_end" type="time" value="{{ old('session_end') }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="inability" class="col-sm-4 col-form-label">Fecha de inactividad</label>
                            <div class="col-sm-8">
                                <x-input name="inability" type="date" min="{{date('Y-m-d')}}" value="{{ old('inability') }}" />
                            </div>
                        </div>

                        {{-- tiempo de baja --}}
                        <div class="form-group row">
                            <label for="count_session" class="col-sm-4 col-form-label">Cantidad de sesiones</label>
                            <div class="col-sm-8">
                                <x-input name="count_session" type="number" min="1" value="{{ old('count_session') }}" />
                            </div>
                        </div>


                        {{-- Tipo de lesion --}}
                        <div class="form-group row">
                            <label for="severity" class="col-sm-4 col-form-label">Tipo de lesión</label>
                            <div class="col-sm-8">
                                <x-select name="severity">
                                    <option disabled {{ old('severity') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($severities as $severity)
                                    <option {{ old('severity') == $severity ? 'selected' : '' }} value="{{ $severity }}">{{ $severity }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Datos extra</label>
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


</x-app-layout>

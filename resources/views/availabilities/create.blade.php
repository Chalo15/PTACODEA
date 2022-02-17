<x-app-layout title="Nueva Disponibilidad">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('availabilities.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Nueva Disponibilidad
                </div>
                
                <div class="card-body">
                    <form action="{{ route('availabilities.store') }}" method="POST">
                        @csrf

                        {{-- Encargado --}}
                        <div class="form-group row">
                            <label for="manager" class="col-sm-4 col-form-label">Encargado</label>
                            <div class="col-sm-8">
                                @php
                                $user = Auth::user();
                                @endphp
                                <x-input name="manager" value="{{ $user->full_name }}" readonly="readonly"/>
                            </div>
                        </div>

                        {{-- Fecha de disponibilidad --}}
                        @php
                        $today = today()->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{ $today }}" max="{{ $nextWeek }}" value="{{ $today }}" />
                            </div>
                        </div>


                        {{-- Hora Inicio --}}
                        <div class="form-group row">
                            <label for="start" class="col-sm-4 col-form-label">Hora Inicio</label>
                            <div class="col-sm-8">
                                <x-select2 name="start">
                                    <option disabled {{ old('start') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($schedules as $schedule)
                                        <option {{ old('start') == $schedule ? 'selected' : '' }} value="{{ $schedule }}">
                                            {{ $schedule }}
                                        </option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>

                        {{-- Hora Final --}}
                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Hora Final</label>
                            <div class="col-sm-8">
                                <x-select2 name="end">
                                    <option disabled {{ old('end') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($schedules as $schedule)
                                        <option {{ old('end') == $schedule ? 'selected' : '' }} value="{{ $schedule }}">
                                            {{ $schedule }}
                                        </option>
                                    @endforeach
                                </x-select2>
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
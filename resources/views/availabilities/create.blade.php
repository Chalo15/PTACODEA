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
                    <form id="form_availabilities_create" action="{{ route('availabilities.store') }}" method="POST">
                        @csrf

                        {{-- Fecha de disponibilidad --}}
                        @php
                            $today = today()->toDateString();
                            $thisWeek = date('Y-m-d', strtotime('sunday this week'));
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input name="date" type="date" min="{{ $today }}" max="{{ $thisWeek }}"
                                    value="{{ $today }}" />
                            </div>
                        </div>


                                {{-- Hora Inicio --}}
                                <div class="form-group row">
                                    <label for="start" class="col-sm-4 col-form-label">Hora Inicio</label>
                                    <div class="col-sm-8">
                                        <x-select2 name="start" id="inicio">
                                            <option disabled {{ old('start') ? '' : 'selected' }} value=""> --
                                                Seleccione -- </option>
                                            @foreach ($schedules as $schedule)
                                                <option {{ old('start') == $schedule ? 'selected' : '' }}
                                                    value="{{ $schedule }}">
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
                                            <option disabled {{ old('end') ? '' : 'selected' }} value=""> --
                                                Seleccione -- </option>
                                            @foreach ($schedules as $schedule)
                                                <option {{ old('end') == $schedule ? 'selected' : '' }}
                                                    value="{{ $schedule }}">
                                                    {{ $schedule }}
                                                </option>
                                            @endforeach
                                        </x-select2>
                                    </div>
                                </div>

                 

                        <div class="form-group row">

                            <div class="col-sm-8">
                                <x-input name="state" type="hidden" value="PENDIENTE" />
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


 $(document).ready(function(){


//Validaciones del formulario
    if($("#form_availabilities_create").length > 0)
    {
        $('#form_availabilities_create').validate({
        rules:{

        start: {
        required : true,  
        time_select : true
        },
        end: {
        required : true,    
        time_select : true           
        },
        },

        start : {
        athlete_id: {
        required : 'Por favor seleccione una hora de inicio *'    
        },
        end: {
        required : 'Por favor seleccione una hora de finalización *'             
        },     
        }
        });
    }
});

    </script>
    
@endpush


</x-app-layout>

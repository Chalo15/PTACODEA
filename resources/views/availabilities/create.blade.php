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


    $("#time_select").change(function() {
    var time = $(this). children("option:selected"). val();  
    if(time == "7:00"){
        $("#start").prop('required',true);
    }
    else if(time == "no"){           
        $("#end").removeAttr("required");
    }
    }); 



//Metodo para validar la hora
jQuery.validator.addMethod("horahhmm", function(value, element) {
	var res = false;

	// Formato hh:mm
	res = this.optional(element) || /^\d{2}[:]\d{2}$/.test(value);

	var hora = value.split(':');
	var hh = parseInt(hora[0],10);
	var mm = parseInt(hora[1],10);
	if (hh < 0 || hh > 23) res = false;
	if (mm < 0 || mm > 59) res = false;

	return res;
}, "La hora indicada no es válida"
);    

//Metodo para validar número telefónico
jQuery.validator.addMethod("phonenumber", function (value, element) {
        if ( /^\d{3}-?\d{3}-?\d{2}$/g.test(value) ) {
            return true;
        } else {
            return false;
        };
    }, "El número telefónico debe tener 8 dígitos *");
    
//Método que valida solo numeros
    jQuery.validator.addMethod("numbersonly", function(value, element) {
    return this.optional(element) || /^[0-9]+$/i.test(value);
    }, 'Por favor digite solo valores numéricos y números naturales *',);  


//Método que valida solo letras
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, 'Por favor digite solo valores alfanuméricos *',);  

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
        "Por motivos de seguridad, asegúrese de que su contraseña contenga letras mayúsculas, minúsculas y dígitos *");

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

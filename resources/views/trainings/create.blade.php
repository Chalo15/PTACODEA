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

        

    @push('scripts')
    <script>


 $(document).ready(function(){


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
    if($("#form_physios_create").length > 0)
    {
        $('#form_physios_create').validate({
        rules:{

        athlete_id: {
        required : true    
        },
        sph: {
        required : true               
        },
        app: {
        required : true     
        },        
        treatment: {
        required : true 
        },
        surgeries: {
        required : true 
        },
        fractures: {
        required : true 
        },
        session_start: {
        required : true,
        horahhmm : true
        },
        session_end: {
        required : true 
        },
        inability: {
        required : true 
        },
        count_session: {
        required : true, 
        numbersonl: true
        },
        severity: {       
        required : true 
        },
        },

        messages : {
        athlete_id: {
        required : 'Por favor seleccione un atleta *'    
        },
        sph: {
        required : 'Por favor ingrese su SPH *'               
        },
        app: {
        required : 'Por favor ingrese su APP *'     
        },        
        treatment: {
        required : 'Por favor ingrese el detalle del tratamiento *' 
        },
        surgeries: {
        required : 'Por favor ingrese el detalle de la cirujía *' 
        },
        fractures: {
        required : 'Por favor ingrese el detalle de la fractura *' 
        },
        session_start: {
        required : 'Por favor ingrese la hora de inicio *' 
        },
        session_end: {
        required : 'Por favor ingrese la hora de fin *' 
        },
        inability: {
        required : 'Por favor ingrese su dirección completa *' 
        },
        count_session: {
        required : 'Por favor ingrese la cantidad de secciones *' 
        },
        severity: {       
        required : 'Por favor ingrese el tipo de lesión*' 
        },
        }
        });
    }
});

    </script>
    
@endpush


</x-app-layout>
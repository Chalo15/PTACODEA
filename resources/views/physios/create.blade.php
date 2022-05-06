<x-app-layout title="Nueva Fisioterapia">

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
                    Nueva Fisioterapia
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.store') }}" method="POST" id='form_physios_create'>
                        @csrf

                        {{-- Fecha de registro --}}
                        @php
                        $today = today()->toDateString();
                        /*$lastWeek = today()->subDays(7)->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();*/
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                <x-input readonly name="date" type="date" {{--min="{{ $lastWeek }}" max="{{ $nextWeek }}"--}} value="{{ $today }}" />
                            </div>
                        </div>

                        {{-- Hora de registro --}}
                        @php
                        $hour = now()->toTimeString();
                        /*$today = today()->toDateString();
                        $lastWeek = today()->subDays(7)->toDateString();
                        $nextWeek = today()->addDay(7)->toDateString();*/
                        @endphp
                        <div class="form-group row">

                            <label for="date" class="col-sm-4 col-form-label">Hora</label>
                            <div class="col-sm-8">
                                <x-input readonly name="time" type="time" {{--min="{{ $lastWeek }}" max="{{ $nextWeek }}"--}} value="{{ $hour }}" />
                            </div>
                        </div>

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
                                {{-- Lesiones --}}
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
                                {{-- Fracturas --}}
                                <div class="form-group row">
                                    <label for="fractures" class="col-sm-4 col-form-label">Detalle de la
                                        fractura</label>
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
                                <x-input name="inability" type="date" min="{{ date('Y-m-d') }}" value="{{ old('inability') }}" />
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
                                    <option disabled {{ old('severity') ? '' : 'selected' }} value=""> -- Seleccione
                                        -- </option>
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

        

@push('scripts')
    <script>


 $(document).ready(function(){


    //Metodo para validar la cédula
/*jQuery.validator.addMethod("idnumber", function (value, element) {
        if ( /^\d{3}-?\d{3}-?\d{3}$/g.test(value) ) {
            return true;
        } else {
            return false;
        };
    }, "La cédula debe tener 9 dígitos ");
*/
//Metodo para validar la cédula
jQuery.validator.addMethod("idnumber", function (value, element) {
        if ( /^\d{2}-?\d{1}-?\d{1}$/g.test(value) ) {
            return true;
        } else {
            return false;
        };
    }, "La cédula debe tener 9 dígitos *");

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

//Metodo que valida la fecha de nacimiento
$.validator.addMethod("CheckDOB", function (value, element) {
       var  minDate = Date.parse("01/01/1990");  
        var today=new Date();
        var DOB = Date.parse(value);  
        if((DOB <= today && DOB >= minDate)) {  
            return true;  
        }  
        return false;  
    }, "La fecha de nacimiento es invalida");

//Validaciones del formulario
    if($("#form_physios_create").length > 0)
    {
        $('#form_physios_create').validate({
        rules:{
            identification : {
            required : true,
            maxlength : 15,
            minlength: 9    
            },
            name : {
            required : true,
            lettersonly: true,
            maxlength : 30,
            minlength: 3    
            },
            last_name : {
            required : true,
            lettersonly: true,
            minlength: 3, 
            maxlength : 30          
            },
            city : {
            required : true,
            lettersonly: true,
            minlength: 3, 
            maxlength : 30    
            },
            severity:{
            required : true
            },
            email : {
            required : true,
            maxlength : 30, 
            minlength: 3,
            email : true
            },
            phone : {
            required : true,        
            numbersonly: true,
            phonenumber: true
            },
            sph : {
            required : true,
            minlength : 20,
            maxlength : 120
            },
            experience:{
            required : true,
            numbersonly: true,
//            min : 1,
            max : 50
            },
            contract_number:{
            required : true,
            numbersonly: true,
            minlength : 1,
            maxlength : 5
            },
            contract_year:{
            required : true,
            numbersonly: true,
            max : 50,
            min : 1
            },
            other_phone:{
            required : true,        
            numbersonly: true,
            phonenumber: true
            },
            password : {
            required : true,
            passwordCheck:true,
            minlength : 8,
            maxlength : 60
            },
            password_confirmation : {
            required : true,
            equalTo: "#password"
            },
          /*  message : {
            required : true,
            minlength : 50,
            maxlength : 500
            }*/
        },

        messages : {
            identification : { 
            required : 'Por favor ingrese su cédula *',
            maxlength : 'Su cédula de identidad no puede ser mayor a 15 caracteres o dígitos *',
            minlength : 'Su cédula de identidad no puede ser menor a 9 caracteres o dígitos *'
            },
            name : {
            required : 'Por favor ingrese su nombre *',
            maxlength : 'Su nombre no puede ser mayor a 30 caracteres *',
            minlength : 'Su nombre no puede ser menor a 3 caracteres *'
            },
            last_name : {
            required : 'Por favor ingrese sus apellidos *',
            maxlength : 'Sus apellidos no pueden ser mayores a 30 caracteres *',
            minlength : 'Sus apellidos no pueden ser menores a 3 caracteres *'
            },
            city : {
            required : 'Por favor ingrese la ciudad donde vive *',
            maxlength : 'La ciudad no puede ser mayor a 30 caracteres *',
            minlength : 'La ciudad no puede ser menor a 3 caracteres *'
            },
            severity:{
            required : 'Por favor ingrese su tipo de lesión *'
            },
            email : {
            required : 'Por favor ingrese su email *',
            email : 'Por favor ingrese una dirección de correo electrónico válida *',
            maxlength : 'Su correo electrónico no puede ser de más de 30 caracteres *',
            minlength : 'Su correo electrónico no puede ser de menos de 3 caracteres *'
            },
            phone : {
            required : 'Por favor ingrese su número telefónico *'
            },
            sph : {
            required : 'Por favor ingrese su dirección completa *',
            maxlength : 'Su dirección no puede ser de más de 20 caracteres *',
            minlength : 'Su dirección no puede ser de menos de 120 caracteres *'
            },
            experience : {
            required : 'Por favor ingrese sus años de experiencia *',
            max : 'Sus años de experiencia no pueden ser de más de 50 *'       
            },
            contract_number : {
            required : 'Por favor ingrese su número de contacto *',
            maxlength : 'Su número de contrato no puede ser de más de 5 caracteres *',
            minlength : 'Su número de contrato no puede ser de menos de 1 caracter *'   
            },
            contract_year : {
            required : 'Por favor ingrese su años de contacto *',
            max : 'Sus años de contrato no pueden ser de más de 50 *',
            min : 'Sus años de contrato no pueden ser de menos de 1 *'  
            },
            address : {
            required : 'Por favor ingrese su dirección exacta *',
            minlength : 'La dirección no puede ser menor a 20 caracteres *',
            maxlength : 'La dirección no puede ser mayor a 120 caracteres *'
            },
            other_phone : {
            required : 'Por favor ingrese su número telefónico *'
            },
            password : {
            required : 'Por favor ingrese su contraseña *',
            minlength : 'La contraseña no puede ser menor a 8 caracteres *',
            maxlength : 'La contraseña no puede ser mayor a 60 caracteres *'
            },
            password_confirmation : {
            required : 'Por favor ingrese de nuevo su contraseña *',
            equalTo: 'Por favor introduzca la misma contraseña *'
            },


         /*   message : {
            required : 'Enter Message Detail',
            minlength : 'Message Details must be minimum 50 character long',
            maxlength : 'Message Details must be maximum 500 character long'
            }*/
        }
        });
    }
});

    </script>
    
@endpush


</x-app-layout>

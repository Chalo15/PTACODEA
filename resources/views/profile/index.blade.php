<x-app-layout title="Perfil">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            Foto de Perfil
                        </div>

                        <div class="card-body">
                            <div x-data="{ isOpen: {{ old('picture') || $errors->has('picture') ? 'true' : 'false' }} }">

                                <div x-show="!isOpen">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <img src="{{ $user->photo ? asset($user->photo) : asset('images/default.png') }}" class="rounded mx-auto d-block" width="200" height="200">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button @click="isOpen = !isOpen" type="button" class="btn btn-secondary">
                                            <i class="fas fa-edit"></i> &nbsp;
                                            Editar
                                        </button>
                                    </div>
                                </div>

                                <div x-show="isOpen">
                                    <form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col d-flex justify-content-center mb-3">
                                                <img id="selected" class="rounded" style="max-height: 200px; max-width: 200px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <x-input type="file" name="image" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button @click="isOpen = !isOpen" type="button" class="btn btn-secondary mr-3">
                                                    <i class="fas fa-times"></i> &nbsp;
                                                    Cancelar
                                                </button>

                                                <button class="btn btn-primary">
                                                    <i class="fas fa-save"></i> &nbsp;
                                                    Actualizar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <div class="card mb-3">
                        <div class="card-header">
                            Cambiar Contraseña
                        </div>

                        <div class="card-body">
                            <form id='form_profile_index' action="{{ route('profile.update-password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Contraseña --}}
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Contraseña Actual</label>
                                    <div class="col-sm-8">
                                        <x-input name="current_password" type="password" />
                                    </div>
                                </div>

                                <hr>

                                {{-- Contraseña --}}
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Nueva Contraseña</label>
                                    <div class="col-sm-8">
                                        <x-input name="password" type="password" />
                                    </div>
                                </div>

                                {{-- Confirmación de contraseña --}}
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de contraseña</label>
                                    <div class="col-sm-8">
                                        <x-input name="password_confirmation" type="password" />
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-save"></i> &nbsp;
                                        Actualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg">

            <div class="card mb-3">
                <div class="card-header">
                    Información Personal
                </div>

                <div class="card-body">
                    <form id='form_profile_index' action="{{ route('profile.update-personal-information') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                            <div class="col-sm-8">
                                <x-input readonly name="identification" value="{{ $user->identification }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <x-input  readonly name="name" value="{{ $user->name }}" />
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <x-input  readonly name="last_name" value="{{ $user->last_name }}" />
                            </div>
                        </div>

                        {{-- Fecha de Nacimiento --}}
                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="birthdate" value="{{ $user->birthdate }}" />
                            </div>
                        </div>

                        {{-- Provincia --}}
                        <div class="form-group row">
                            <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <x-select name="province">
                                    <option {{ !$user->province ? 'selected' : '' }} disabled value=""> -- Seleccione -- </option>
                                    @foreach ($provinces as $province)
                                    <option {{ $user->province && $user->province == $province  ? 'selected' : '' }} value="{{ $province }}">{{ $province }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Ciudad --}}
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                            <div class="col-sm-8">
                                <x-input id='city' name="city" value="{{ $user->city }}" />
                            </div>
                        </div>

                        <hr>

                        {{-- Correo Electrónico --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                            <div class="col-sm-8">
                                <x-input type="email" name="email" value="{{ $user->email }}" />
                            </div>
                        </div>

                        {{-- Teléfono --}}
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <x-input id='phone' name="phone" value="{{ $user->phone }}" />
                            </div>
                        </div>

                        {{-- Dirección Exacta --}}
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-8">
                                <x-textarea name="address" value="{{ $user->address }}" />
                            </div>
                        </div>

                        <hr>

                        {{-- Género --}}
                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Género</label>
                            <div class="col-sm-8">
                                @foreach ($genders as $gender)
                                <div class="custom-control custom-radio">
                                    <input {{ $user->gender == $gender ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ $gender }}">
                                    <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">
                                <i class="fas fa-save"></i> &nbsp;
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#selected').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

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
/*$.validator.addMethod("CheckDOB", function (value, element) {
       var  minDate = Date.parse("01/01/1990");  
        var today=new Date();
        var DOB = Date.parse(value);  
        if((DOB <= today && DOB >= minDate)) {  
            return true;  
        }  
        return false;  
    }, "La fecha de nacimiento es invalida");*/

//Validaciones del formulario
    if($('#form_profile_index').length > 0)
    {
        $('#form_profile_index').validate({
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
            birthdate:{
            required : true
            },
            province:{
            required : true
            },
            city : {
            required : true,
            lettersonly: true,
            minlength: 3, 
            maxlength : 30    
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
            address : {
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
            role_id:{
            required : true
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
            pdf:{
            required : true
            },
            sport_id:{
            required : true
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
            birthdate:{
            required : 'Por favor ingrese su fecha de nacimiento *'
            },
            province:{
            required : 'Por favor ingrese su provincia *'
            },
            city : {
            required : 'Por favor ingrese la ciudad donde vive *',
            maxlength : 'La ciudad no puede ser mayor a 30 caracteres *',
            minlength : 'La ciudad no puede ser menor a 3 caracteres *'
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
            address : {
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
            role_id:{
            required : 'Por favor ingrese su rol *'
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
            pdf:{
            required : 'Por favor ingrese la copia de su cédula de identidad *'
            },
            sport_id:{
            required : 'Por favor ingrese su disciplina *'
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

<x-guest-layout title="Registrarme">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Registro
                    </div>

                    <div class="card-body">
                        <form id='form_register' action="/register" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input name="identification" value="{{ old('identification') }} " pattern="[0-9]+"/>
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <x-input name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <x-input name="last_name" value="{{ old('last_name') }}" />
                                </div>
                            </div>

                            {{-- Correo Electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input type="email" name="email" value="{{ old('email') }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <x-input name="phone" value="{{ old('phone') }}" />
                                </div>
                            </div>                 

                            {{-- Contraseña --}}
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password" type="password" />
                                </div>
                            </div>

                            {{-- Confirmación de contraseña --}}
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de contraseña</label>
                                <div class="col-sm-8">
                                    <x-input  name="password_confirmation" type="password" />
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> &nbsp;
                                    Registrar
                                </button>
                            </div>

                        </form>

                        <hr>

                        <div class="row">
                            <div class="col">
                                ¿Ya tienes cuenta? Click <a href="{{ route('login') }}" class="link">aquí</a>.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@push('scripts')
    <script>


 $(document).ready(function(){


//Metodo para validar la cédula
jQuery.validator.addMethod("idnumber", function (value, element) {
        if ( /^\d{2}-?\d{1}-?\d{1}$/g.test(value) ) {
            return true;
        } else {
            return false;
        };
    }, "La cédula debe tener 4 dígitos ");

//Metodo para validar número telefónico
jQuery.validator.addMethod("phonenumber", function (value, element) {
        if ( /^\d{3}-?\d{3}-?\d{2}$/g.test(value) ) {
            return true;
        } else {
            return false;
        };
    }, "El número telefónico debe tener 8 dígitos ");

//Método que valida solo numeros
    jQuery.validator.addMethod("numbersonly", function(value, element) {
    return this.optional(element) || /^[0-9]+$/i.test(value);
    }, 'Por favor digite solo valores numéricos *',);  


//Método que valida solo letras
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, 'Por favor digite solo cadenas de texto sin números o caracteres especiales *',);  

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
    if($("#form_register").length > 0)
    {
        $('#form_register').validate({
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
            email : {
            required : 'Por favor ingrese su email *',
            email : 'Por favor ingrese una dirección de correo electrónico válida *',
            maxlength : 'Su correo electrónico no puede ser de más de 30 caracteres *',
            minlength : 'Su correo electrónico no puede ser de menos de 3 caracteres *'
            },
            phone : {
            required : 'Por favor ingrese su número telefónico *',
            },
            password : {
            required : 'Por favor ingrese su contraseña *',
            minlength : 'La contraseña no debe ser menor a 8 caracteres *',
            maxlength : 'La contraseña no debe ser mayor a 60 caracteres *'
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

</x-guest-layout>

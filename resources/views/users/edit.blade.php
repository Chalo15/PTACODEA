<x-app-layout title="Editar Usuario">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    {{-- Fecha de registr --}}
    @php

    $today = today()->toDateString();
    $age = today()
    ->subYears(18)
    ->toDateString();

    @endphp



    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Editar Usuario
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" id='form_users_edit'>
                        @csrf
                        @method('PUT')
                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                DIMEX</label>
                            <div class="col-sm-8">
                                <x-input  readonly name="identification" value="{{ $user->identification }}" />
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
                                <x-input type="date" max="{{ $age }}" name="birthdate" value="{{ $user->birthdate }}" />
                            </div>
                        </div>

                        {{-- Provincia --}}
                        <div class="form-group row">
                            <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <x-select name="province">
                                    <option {{ $user->province ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($provinces as $province)
                                    <option {{ $user->province == $province ? 'selected' : '' }} value="{{ $province }}">{{ $province }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Ciudad --}}
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                            <div class="col-sm-8">
                                <x-input name="city" value="{{ $user->city }}" />
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
                                <x-input name="phone" value="{{ $user->phone }}" />
                            </div>
                        </div>

                        {{-- Dirección Exacta --}}
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-8">
                                <x-textarea name="address">
                                    {{ $user->address }}
                                </x-textarea>
                            </div>
                        </div>

                        <hr>

                        {{-- Género --}}
                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Género</label>
                            <div class="col-sm-8">
                                @foreach ($genders as $gender)
                                <div class="custom-control custom-radio">
                                    <input {{ $user->gender && $user->gender == $gender ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ old('gender') ?? $user->gender }}">
                                    <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <hr>

                        {{-- Años de Experiencia --}}
                        <div class="form-group row">
                            <label for="experience" class="col-sm-4 col-form-label">Años de Experiencia</label>
                            <div class="col-sm-8">
                                <x-input name="experience" value="{{ $user->experience }}" />
                            </div>
                        </div>

                        {{-- Número de Contrato --}}
                        <div class="form-group row">
                            <label for="contract_number" class="col-sm-4 col-form-label">Número de Contrato</label>
                            <div class="col-sm-8">
                                <x-input name="contract_number" value="{{ $user->contract_number }}" />
                            </div>
                        </div>

                        {{-- Año de Contrato --}}
                        <div class="form-group row">
                            <label for="contract_year" class="col-sm-4 col-form-label">Año de Contrato</label>
                            <div class="col-sm-8">
                                <x-input name="contract_year" value="{{ $user->contract_year }}" />
                            </div>
                        </div>

                        <hr>

                        {{-- Role --}}
                        <div x-data="{ role: '{{ $user->role_id ?? '' }}' }">

                            <div class="form-group row">
                                <label for="role_id" class="col-sm-4 col-form-label">Rol</label>
                                <div class="col-sm-8">
                                    <x-select name="role_id" x-model="role">
                                        <option disabled value=""> -- Seleccione -- </option>
                                        @foreach ($roles as $role)

                                        @if ($role->id == 4)
                                        @continue
                                        @endif

                                        <option value="{{ $role->id }}">{{ $role->description }}</option>

                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            {{-- Entrenadores --}}
                            <div x-show="role == 2">

                                {{-- Deporte --}}
                                <div class="form-group row">
                                    <label for="sport" class="col-sm-4 col-form-label">Deporte</label>
                                    <div class="col-sm-8">
                                        <x-select name="sport_id">
                                            <option disabled value=""> -- Seleccione -- </option>
                                            @foreach ($sports as $sport)
                                            <option {{ $user->role_id == 2 && $user->coach->sport == $sport ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Teléfono Celular --}}
                                <div class="form-group row">
                                    <label for="other_phone" class="col-sm-4 col-form-label">Teléfono Celular</label>
                                    <div class="col-sm-8">
                                        <x-input name="other_phone" value="{{ $user->role_id == 2 && $user->coach->phone }}" />
                                    </div>
                                </div>

                                {{-- Fotocópia de Cédula --}}
                                <div class="form-group row">
                                    <label for="pdf" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">

                                            <label class="custom-file-label" for="pdf">Elija el archivo </label>
                                            <x-input aria-describedby="inputGroupFileAddon01" id="pdf" name="pdf" type="file" class="custom-file-input" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Contraseña --}}
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                            <div class="col-sm-8">
                                <x-input name="password" type="password" />
                            </div>
                        </div>

                        {{-- Confirmación de contraseña --}}
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                contraseña</label>
                            <div class="col-sm-8">
                                <x-input name="password_confirmation" type="password" />
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
        $(document).ready(function() {

            //Metodo para validar la cédula
            jQuery.validator.addMethod("idnumber", function(value, element) {
                if (/^\d{2}-?\d{1}-?\d{1}$/g.test(value)) {
                    return true;
                } else {
                    return false;
                };
            }, "La cédula debe tener 9 dígitos *");

            //Metodo para validar número telefónico
            jQuery.validator.addMethod("phonenumber", function(value, element) {
                if (/^\d{3}-?\d{3}-?\d{2}$/g.test(value)) {
                    return true;
                } else {
                    return false;
                };
            }, "El número telefónico debe tener 8 dígitos *");


 $(document).ready(function(){

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
            if ($("#form_users_edit").length > 0) {
                $('#form_users_edit').validate({
                    rules: {
                        birthdate: {
                            required: true
                        },
                        province: {
                            required: true
                        },
                        city: {
                            required: true,
                            lettersonly: true,
                            minlength: 3,
                            maxlength: 30
                        },
                        email: {
                            required: true,
                            maxlength: 30,
                            minlength: 3,
                            email: true
                        },
                        phone: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        address: {
                            required: true,
                            minlength: 20,
                            maxlength: 120
                        },
                        experience: {
                            required: true,
                            numbersonly: true,
                            max: 50
                        },
                        contract_number: {
                            required: true,
                            numbersonly: true,
                            minlength: 1,
                            maxlength: 5
                        },
                        contract_year: {
                            required: true,
                            numbersonly: true,
                            max: 50,
                            min: 1
                        },
                        other_phone: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        role_id: {
                            required: true
                        },
                        password: {
                            required: true,
                            passwordCheck: true,
                            minlength: 8,
                            maxlength: 60
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        },
                        pdf: {
                            required: true
                        },
                        sport_id: {
                            required: true
                        },
                    },

                    messages: {
                        birthdate: {
                            required: 'Por favor ingrese su fecha de nacimiento *'
                        },
                        province: {
                            required: 'Por favor ingrese su provincia *'
                        },
                        city: {
                            required: 'Por favor ingrese la ciudad donde vive *',
                            maxlength: 'La ciudad no puede ser mayor a 30 caracteres *',
                            minlength: 'La ciudad no puede ser menor a 3 caracteres *'
                        },
                        email: {
                            required: 'Por favor ingrese su email *',
                            email: 'Por favor ingrese una dirección de correo electrónico válida *',
                            maxlength: 'Su correo electrónico no puede ser de más de 30 caracteres *',
                            minlength: 'Su correo electrónico no puede ser de menos de 3 caracteres *'
                        },
                        phone: {
                            required: 'Por favor ingrese su número telefónico *'
                        },
                        address: {
                            required: 'Por favor ingrese su dirección completa *',
                            maxlength: 'Su dirección no puede ser de más de 120 caracteres *',
                            minlength: 'Su dirección no puede ser de menos de 20 caracteres *'
                        },
                        experience: {
                            required: 'Por favor ingrese sus años de experiencia *',
                            max: 'Sus años de experiencia no pueden ser de más de 50 *'
                        },
                        contract_number: {
                            required: 'Por favor ingrese su número de contacto *',
                            maxlength: 'Su número de contrato no puede ser de más de 5 caracteres *',
                            minlength: 'Su número de contrato no puede ser de menos de 1 caracter *'
                        },
                        contract_year: {
                            required: 'Por favor ingrese su años de contacto *',
                            max: 'Sus años de contrato no pueden ser de más de 50 *',
                            min: 'Sus años de contrato no pueden ser de menos de 1 *'
                        },
                        other_phone: {
                            required: 'Por favor ingrese su número telefónico *'
                        },
                        role_id: {
                            required: 'Por favor ingrese su rol *'
                        },
                        password: {
                            required: 'Por favor ingrese su contraseña *',
                            minlength: 'La contraseña no puede ser menor a 8 caracteres *',
                            maxlength: 'La contraseña no puede ser mayor a 60 caracteres *'
                        },
                        password_confirmation: {
                            required: 'Por favor ingrese de nuevo su contraseña *',
                            equalTo: 'Por favor introduzca la misma contraseña *'
                        },
                        pdf: {
                            required: 'Por favor ingrese la copia de su cédula de identidad *'
                        },
                        sport_id: {
                            required: 'Por favor ingrese su disciplina *'
                        },
                    }
                });
            }
            return true;
        },
        "Por motivos de seguridad, asegúrese de que su contraseña contenga letras mayúsculas, minúsculas y dígitos *");

//Validaciones del formulario
    if($("#form_users_edit").length > 0)
    {
        $('#form_users_edit').validate({
        rules:{
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
        },

        messages : {
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
            maxlength : 'Su dirección no puede ser de más de 120 caracteres *',
            minlength : 'Su dirección no puede ser de menos de 20 caracteres *'
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
        }
        });
    </script>

@endpush
</x-app-layout>

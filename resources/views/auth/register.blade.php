<x-guest-layout title="Registrarme">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center d-block font-weight-bold ">
                            Registro
                        </h2>
                    </div>

                    <div class="card-body">
                        <form id='form_register' action="/register" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                    DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input onkeyup="validarForm()" id="identification" class="identification"
                                        name="identification" value="{{ old('identification') }}" />
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

                            {{-- Fecha de Nacimiento --}}
                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-8">
                                    <x-input type="date" name="birthdate" value="{{ old('birthdate') }}" />
                                </div>
                            </div>

                            {{-- Distrtito --}}
                            <div class="form-group row">
                                <label for="district" class="col-sm-4 col-form-label">Distrtito</label>
                                <div class="col-sm-8">
                                    <x-select name="district">
                                        <option disabled {{ old('district') ? '' : 'selected' }} value=""> --
                                            Seleccione -- </option>
                                        @foreach ($districts as $district)
                                            <option {{ old('district') == $district ? 'selected' : '' }}
                                                value="{{ $district }}">{{ $district }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            {{-- Dirección Exacta --}}
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    <x-textarea name="address">
                                        {{ old('address') }}
                                    </x-textarea>
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

                            {{-- Género --}}
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label">Género</label>
                                <div class="col-sm-8">
                                    @foreach ($genders as $gender)
                                        <div class="custom-control custom-radio">
                                            <input
                                                {{ (old('gender') && old('gender') == $gender) || (!old('gender') && $loop->index == 0) ? 'checked' : '' }}
                                                class="custom-control-input" type="radio" name="gender"
                                                id="gender-{{ $loop->index }}" value="{{ $gender }}">
                                            <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                                {{ $gender }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Categoria --}}
                            <div class="form-group row">
                                <label for="category" class="col-sm-4 col-form-label">Categoria</label>
                                <div class="col-sm-8">
                                    <x-select name="category">
                                        <option disabled {{ old('category') ? '' : 'selected' }} value=""> --
                                            Seleccione -- </option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category') == $category ? 'selected' : '' }}
                                                value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            {{-- Disciplina Deportiva --}}
                            <div class="form-group row">
                                <label for="sport_id" class="col-sm-4 col-form-label">Disciplina Deportiva</label>
                                <div class="col-sm-8">
                                    <x-select2 name="sport_id">
                                        <option disabled {{ old('sport_id') ? '' : 'selected' }} value=""> --
                                            Seleccione
                                            -- </option>
                                        @foreach ($sports as $sport)
                                            <option {{ old('sport_id') == $sport->id ? 'selected' : '' }}
                                                value="{{ $sport }}">{{ $sport }}</option>
                                        @endforeach
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Tipo de Sangre --}}
                            <div class="form-group row">
                                <label for="blood" class="col-sm-4 col-form-label">Tipo de Sangre</label>
                                <div class="col-sm-8">
                                    <x-select name="blood">
                                        <option disabled {{ old('blood') ? '' : 'selected' }} value=""> -- Seleccione
                                            --
                                        </option>
                                        @foreach ($bloods as $blood)
                                            <option {{ old('blood') == $blood ? 'selected' : '' }}
                                                value="{{ $blood }}">{{ $blood }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            {{-- Lateralidad --}}
                            <div class="form-group row">
                                <label for="laterality" class="col-sm-4 col-form-label">Lateralidad</label>
                                <div class="col-sm-8">
                                    @foreach ($lateralities as $laterality)
                                        <div class="custom-control custom-radio">
                                            <input
                                                {{ (old('laterality') && old('laterality') == $laterality) || (!old('laterality') && $loop->index == 0) ? 'checked' : '' }}
                                                class="custom-control-input" type="radio" name="laterality"
                                                id="laterality-{{ $loop->index }}" value="{{ $laterality }}">
                                            <label class="custom-control-label" for="laterality-{{ $loop->index }}">
                                                {{ $laterality }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Número de Póliza --}}
                            <div class="form-group row">
                                <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                                <div class="col-sm-8">
                                    <x-input name="policy" value="{{ old('policy') }}" />
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
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                    contraseña</label>
                                <div class="col-sm-8">
                                    <x-input name="password_confirmation" type="password" />
                                </div>
                            </div>

                            <hr>

                            <div x-data="{ isOpen: {{ old('is_younger') ? 'true' : 'false' }} }">

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="is_younger" id="is_younger"
                                        x-model="isOpen">
                                    <label class="form-check-label" for="is_younger">
                                        ¿El atleta es menor de edad?
                                    </label>
                                </div>

                                <div x-show="isOpen">

                                    <div class="row">
                                        <div class="col mb-3 d-flex justify-content-center">

                                            <h3 class="text-center d-block font-weight-bold ">
                                                Información del Responsable
                                            </h3>
                                        </div>
                                    </div>

                                    {{-- Cédula de Identidad o DIMEX --}}
                                    <div class="form-group row">
                                        <label for="identification_manager" class="col-sm-4 col-form-label">Cédula de
                                            Identidad o DIMEX</label>
                                        <div class="col-sm-8">
                                            <x-input name="identification_manager"
                                                value="{{ old('identification_manager') }}" />
                                        </div>
                                    </div>

                                    {{-- Nombre --}}
                                    <div class="form-group row">
                                        <label for="name_manager" class="col-sm-4 col-form-label">Nombre</label>
                                        <div class="col-sm-8">
                                            <x-input name="name_manager" value="{{ old('name_manager') }}" />
                                        </div>
                                    </div>

                                    {{-- Apellidos --}}
                                    <div class="form-group row">
                                        <label for="lastname_manager" class="col-sm-4 col-form-label">Apellidos</label>
                                        <div class="col-sm-8">
                                            <x-input name="lastname_manager" value="{{ old('lastname_manager') }}" />
                                        </div>
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="form-group row">
                                        <label for="contact_manager" class="col-sm-4 col-form-label">Teléfono</label>
                                        <div class="col-sm-8">
                                            <x-input name="contact_manager" value="{{ old('contact_manager') }}" />
                                        </div>
                                    </div>

                                    {{-- Parentezco --}}
                                    <div class="form-group row">
                                        <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                                        <div class="col-sm-8">
                                            <x-select name="manager">
                                                <option disabled {{ old('manager') ? '' : 'selected' }} value=""> --
                                                    Seleccione -- </option>
                                                @foreach ($relationships as $relationship)
                                                    <option {{ old('manager') == $relationship ? 'selected' : '' }}
                                                        value="{{ $relationship }}">{{ $relationship }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    {{-- Fotocópia de Cédula --}}
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                        <div class="col-sm-4">
                                            <div class="input-group mb-3">
                                                <label class="custom-file-label" for="identification_image">Elija el
                                                    archivo
                                                </label>
                                                <input name="url" type="file" class="custom-file-input"
                                                    id="identification_image" aria-describedby="inputGroupFileAddon01">
                                            </div>
                                        </div>
                                    </div>
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
                                ¿Ya tienes cuenta? Click <a href="{{ route('login') }}"
                                    class="link">aquí</a>.
                            </div>
                        </div>

                    </div>
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
                }, "La cédula debe tener 4 dígitos ");

                //Metodo para validar número telefónico
                jQuery.validator.addMethod("phonenumber", function(value, element) {
                    if (/^\d{3}-?\d{3}-?\d{2}$/g.test(value)) {
                        return true;
                    } else {
                        return false;
                    };
                }, "El número telefónico debe tener 8 dígitos ");

                //Método que valida solo numeros
                jQuery.validator.addMethod("numbersonly", function(value, element) {
                    return this.optional(element) || /^[0-9]+$/i.test(value);
                }, 'Por favor digite solo valores numéricos *', );


                //Método que valida solo letras
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                    return this.optional(element) || /^[a-z," "]+$/i.test(value);
                }, 'Por favor digite solo cadenas de texto sin números o caracteres especiales *', );

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
                    "Por motivos de seguridad, asegúrese de que su contraseña contenga letras mayúsculas, minúsculas y dígitos *"
                );

                //Validaciones del formulario
                if ($("#form_register").length > 0) {
                    $('#form_register').validate({
                        rules: {
                            identification: {
                                required: true,
                                maxlength: 15,
                                minlength: 9
                            },
                            name: {
                                required: true,
                                lettersonly: true,
                                maxlength: 30,
                                minlength: 3
                            },
                            last_name: {
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
                        },

                        messages: {
                            identification: {
                                required: 'Por favor ingrese su cédula *',
                                maxlength: 'Su cédula de identidad no puede ser mayor a 15 caracteres o dígitos *',
                                minlength: 'Su cédula de identidad no puede ser menor a 9 caracteres o dígitos *'
                            },
                            name: {
                                required: 'Por favor ingrese su nombre *',
                                maxlength: 'Su nombre no puede ser mayor a 30 caracteres *',
                                minlength: 'Su nombre no puede ser menor a 3 caracteres *'
                            },
                            last_name: {
                                required: 'Por favor ingrese sus apellidos *',
                                maxlength: 'Sus apellidos no pueden ser mayores a 30 caracteres *',
                                minlength: 'Sus apellidos no pueden ser menores a 3 caracteres *'
                            },
                            email: {
                                required: 'Por favor ingrese su email *',
                                email: 'Por favor ingrese una dirección de correo electrónico válida *',
                                maxlength: 'Su correo electrónico no puede ser de más de 30 caracteres *',
                                minlength: 'Su correo electrónico no puede ser de menos de 3 caracteres *'
                            },
                            phone: {
                                required: 'Por favor ingrese su número telefónico *',
                            },
                            password: {
                                required: 'Por favor ingrese su contraseña *',
                                minlength: 'La contraseña no debe ser menor a 8 caracteres *',
                                maxlength: 'La contraseña no debe ser mayor a 60 caracteres *'
                            },
                            password_confirmation: {
                                required: 'Por favor ingrese de nuevo su contraseña *',
                                equalTo: 'Por favor introduzca la misma contraseña *'
                            },
                        }
                    });
                }
            });
        </script>
    @endpush


    @push('scripts')
        <script>
            //Expresiones regulares
            const expresiones = {
                nombre: /[a-zA-Z]{4,16}/,
                usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
                password: /^.{4,12}$/, // 4 a 12 digitos.contraseñas
                correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //correos
                id: /^[0-9]{9}$/, //Solo numeros, 9 numeros requeridos
                telefono: /^[0-9]{8}$/,
                numeros: /^[0-9]/,
                CCV: /^[0-9]{3}$/,
                fecha_de_vencimiento: /[0-9]+[/]+[0-9]{2}/,
            };



            //Logeo
            //Se crean 2 variables
            const formulario = document.getElementById("formulario"); //Variable para identitificar el formulario
            const inputs = document.querySelectorAll(
                '#formulario input'); //Variable para guardar en un array todos los inputs del formulario

            //Validar
            var id;
            var clave;

            //Funcion que hace las validacion del el input correspondiente
            function validarForm(e) {
                try {
                    switch (e.target.name) {
                        case "identification":
                            if (expresiones.id.test(e.target.value) == true && e.target.value != "") { //Correcto
                                console.log("Correcto " + e.target.name);
                                document.getElementById("identification").style.border = "5px solid springgreen";
                                id = true;
                            }
                            if (expresiones.id.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                                console.log("Incorrecto " + e.target.name);
                                document.getElementById("identification").style.border = "5px solid red";
                                id = false;
                            }
                            if (e.target.value == "") {
                                document.getElementById("identification").style.border = "2px solid #f6f6f6";
                            }
                            break;
                        case "fPassword":
                            if (expresiones.password.test(e.target.value) == true && e.target.value != "") { //Correcto
                                console.log("Correcto " + e.target.name)
                                document.getElementById("fPassword").style.border = "5px solid springgreen";
                                password = true;
                            }
                            if (expresiones.password.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                                console.log("Incorrecto " + e.target.name)
                                document.getElementById("fPassword").style.border = "5px solid red";
                                password = false;
                            }
                            if (e.target.value == "") {
                                document.getElementById("fPassword").style.border = "2px solid #f6f6f6";
                            }
                            break;

                    }
                } catch (error) {
                    console.log(error)
                }
            }
        </script>
    @endpush
    </x-app-layout>

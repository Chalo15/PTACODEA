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
                            {{--@json($errors->all())--}}
                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                    DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input id="identification" name="identification" value="{{ old('identification') }}" />
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <x-input id="name" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <x-input name="last_name" id="last_name" value="{{ old('last_name') }}" />
                                </div>
                            </div>

                            {{-- Fecha de Nacimiento --}}
                            @php
                            $today = today()->toDateString();
                            $age = today()
                            ->subYears(7)
                            ->toDateString();
                            @endphp
                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-8">
                                    <x-input type="date" id="birthdate" max="{{ $age }}" name="birthdate" value="{{ old('birthdate') }}" />
                                </div>
                            </div>

                            {{-- Cantón --}}
                            <x-input name="canton" type="hidden" value="Alajuela" />

                            {{-- Distrito --}}
                            <div class="form-group row">
                                <label for="district" class="col-sm-4 col-form-label">Distrito</label>
                                <div class="col-sm-8">
                                    <x-select2 id="district" name="district" value="{{ old('district') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="Alajuela">Alajuela</option>
                                        <option value="San José">San José</option>
                                        <option value="Carrizal">Carrizal</option>
                                        <option value="San Antonio">San Antonio</option>
                                        <option value="Guácima">Guácima</option>
                                        <option value="San Isidro">San Isidro</option>
                                        <option value="Sabanilla">Sabanilla</option>
                                        <option value="San Rafael">San Rafael</option>
                                        <option value="Río Segundo">Río Segundo</option>
                                        <option value="Desamparados">Desamparados</option>
                                        <option value="Turrúcares">Turrúcares</option>
                                        <option value="Tambor">Tambor</option>
                                        <option value="La Garita">La Garita</option>
                                        <option value="Sarapiquí">Sarapiquí</option>
                                        <option value="Otro">Otro</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Dirección Exacta --}}
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    <x-textarea id="address" name="address">
                                        {{ old('address') }}
                                    </x-textarea>
                                </div>
                            </div>

                            {{-- Correo Electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <x-input type="email" id="email" name="email" value="{{ old('email') }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <x-input name="phone" id="phone" value="{{ old('phone') }}" />
                                </div>
                            </div>

                            {{-- Género --}}
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label">Género</label>
                                <div class="col-sm-8">
                                    <x-select2 id="gender" name="gender" value="{{ old('gender') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Categoria --}}
                            <div class="form-group row">
                                <label for="category" class="col-sm-4 col-form-label">Categoria</label>
                                <div class="col-sm-8">
                                    <x-select2 id="category" name="category" value="{{ old('category') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="U-7">U-7</option>
                                        <option value="U-9">U-9</option>
                                        <option value="U-11">U-11</option>
                                        <option value="U-13">U-13</option>
                                        <option value="U-15">U-15</option>
                                        <option value="U-17">U-17</option>
                                        <option value="U-19">U-19</option>
                                        <option value="U-21">U-21</option>
                                        <option value="U-23">U-23</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Disciplina Deportiva --}}
                            <div class="form-group row">
                                <label for="sport_id" class="col-sm-4 col-form-label">Disciplina Deportiva</label>
                                <div class="col-sm-8">
                                    <x-select2 id="sport_id" name="sport_id" value="{{ old('sport_id') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="1">Ajedrez</option>
                                        <option value="2">Atletismo</option>
                                        <option value="3">Baloncesto</option>
                                        <option value="4">Balonmano</option>
                                        <option value="5">Beisbol</option>
                                        <option value="6">Boxeo</option>
                                        <option value="7">Ciclismo de Ruta y Montaña</option>
                                        <option value="8">Fútbol</option>
                                        <option value="9">Futsal</option>
                                        <option value="10">Gimnasia Artística</option>
                                        <option value="11">Gimnasia Rítmica</option>
                                        <option value="12">Halterofilia</option>
                                        <option value="13">Judo</option>
                                        <option value="14">Karate Do</option>
                                        <option value="15">Natación</option>
                                        <option value="16">Patinaje</option>
                                        <option value="17">Tae Kwon Do</option>
                                        <option value="18">Tenis</option>
                                        <option value="19">Baloncesto</option>
                                        <option value="20">Tenis de Mesa</option>
                                        <option value="21">Triatlón</option>
                                        <option value="22">Voleibol</option>
                                        <option value="23">Voleibol de Playa</option>
                                        <option value="24">Tiro con Arco</option>
                                        <option value="25">Football Americano</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Tipo de Sangre --}}
                            <div class="form-group row">
                                <label for="blood" class="col-sm-4 col-form-label">Tipo de Sangre</label>
                                <div class="col-sm-8">
                                    <x-select2 id="blood" name="blood" value="{{ old('blood') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Lateralidad --}}
                            <div class="form-group row">
                                <label for="laterality" class="col-sm-4 col-form-label">Lateralidad</label>
                                <div class="col-sm-8">
                                    <x-select2 id="laterality" name="laterality" value="{{ old('laterality') }}">
                                        <option value="">-- Seleccione --</option>
                                        <option value="D">Diestro</option>
                                        <option value="I">Zurdo</option>
                                        <option value="A">Ambidiestro</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Número de Póliza --}}
                            <div class="form-group row">
                                <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                                <div class="col-sm-8">
                                    <x-input name="policy" id="policy" value="{{ old('policy') }}" />
                                </div>
                            </div>

                            {{-- Número de Dictamen Medico --}}
                            <div class="form-group row">
                                <label for="medical_opinion" class="col-sm-4 col-form-label">Número de Dictamen Medico</label>
                                <div class="col-sm-8">
                                    <x-input name="medical_opinion" id="medical_opinion" value="{{ old('medical_opinion') }}" />
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


                            {{-- Condicion --}}
                            <x-input name="condition" type="hidden" value="A" />

                            <hr>


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
                                    <x-input id="identification_manager" name="identification_manager" value="{{ old('identification_manager') }}" />
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="name_manager" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <x-input id="name_manager" name="name_manager" value="{{ old('name_manager') }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="lastname_manager" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <x-input id="lastname_manager" name="lastname_manager" value="{{ old('lastname_manager') }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="contact_manager" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <x-input id="contact_manager" name="contact_manager" value="{{ old('contact_manager') }}" />
                                </div>
                            </div>

                            {{-- Parentezco --}}
                            <div class="form-group row">
                                <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                                <div class="col-sm-8">
                                    <x-select2 id="manager" name="manager">
                                        <option value="">-- Seleccione --</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Abuelo(a)">Abuelo(a)</option>
                                        <option value="Tío(a)">Tío(a)</option>
                                        <option value="Hermano(a)">Hermano(a)</option>
                                        <option value="Encargado(a)">Encargado(a)</option>
                                    </x-select2>
                                </div>
                            </div>

                            {{-- Fotocópia de Cédula --}}
                            <div class="form-group row">
                                <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <label class="custom-file-label" for="identification_image">Elija el
                                            archivo
                                        </label>
                                        <input name="url" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01">
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
        //Change the name of the label-input-fule
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


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
                return this.optional(element) || /^[a-zA-ZÀ-ÿ\u00f1\u00d1," "]+$/i.test(value);
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
                        address: {
                            required: true,
                            maxlength: 150,
                            minlength: 3
                        },
                        sport_id: {
                            required: true
                        },
                        gender: {
                            required: true
                        },
                        blood: {
                            required: true
                        },
                        laterality: {
                            required: true
                        },
                        district: {
                            required: true
                        },
                        canton: {
                            required: true
                        },
                        category: {
                            required: true
                        },
                        policy: {
                            required: true
                        },
                        medical_opinion: {
                            required: true
                        },
                        name_manager: {
                            required: true,
                            lettersonly: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        lastname_manager: {
                            required: true,
                            lettersonly: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        manager: {
                            required: true
                        },
                        identification_manager: {
                            required: true,
                            maxlength: 15,
                            minlength: 9
                        },
                        contact_manager: {
                            required: true,
                            numbersonly: true,
                            phonenumber: true
                        },
                        url: {
                            required: true
                        },
                        birthdate: {
                            required: true
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
                        address: {
                            required: 'Por favor ingrese su direccion exacta *',
                            maxlength: 'Su dirección no puede ser mayor a 150 caracteres *',
                            minlength: 'Su dirección no puede ser menor a 3 caracteres *'
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
                        sport_id: {
                            required: 'Por favor ingrese su disciplina deportiva *',
                        },
                        gender: {
                            required: 'Por favor ingrese género *',
                        },
                        blood: {
                            required: 'Por favor ingrese su tipo de sangre *',
                        },
                        laterality: {
                            required: 'Por favor ingrese su lateralidad *',
                        },
                        canton: {
                            required: 'Por favor ingrese su cantón *',
                        },
                        district: {
                            required: 'Por favor ingrese su distrito *',
                        },
                        category: {
                            required: 'Por favor ingrese su categoria deportiva *',
                        },
                        policy: {
                            required: 'Por favor ingrese su numero de poliza *',
                        },
                        medical_opinion: {
                            required: 'Por favor ingrese su numero de dictamen medico *',
                        },
                        name_manager: {
                            required: 'Por favor ingrese el nombre del responsable *',
                            maxlength: 'El nombre no puede ser mayor a 30 caracteres *',
                            minlength: 'El nombre no puede ser menor a 3 caracteres *'
                        },
                        lastname_manager: {
                            required: 'Por favor ingrese los apellidos del responsable *',
                            maxlength: 'El apellido no puede ser mayor a 30 caracteres *',
                            minlength: 'El apellido no puede ser menor a 3 caracteres *'
                        },
                        manager: {
                            required: 'Por favor ingrese el parentesco *'
                        },
                        identification_manager: {
                            required: 'Por favor ingrese la cédula de su encargado(a) *',
                            maxlength: 'La cédula de identidad no puede ser mayor a 15 caracteres o dígitos *',
                            minlength: 'La cédula de identidad no puede ser menor a 9 caracteres o dígitos *'
                        },
                        contact_manager: {
                            required: 'Por favor ingrese el número telefónico *',
                        },
                        url: {
                            required: 'Por favor ingrese la fotocopia en formato pdf de la cédula de su encargado *',
                        },
                        birthdate: {
                            required: 'Por favor ingrese su fecha de nacimiento *',
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
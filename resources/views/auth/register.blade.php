<x-guest-layout title="Registrarme">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Registro
                    </div>

                    <div class="card-body">
                        <form id="formulario" action="/register" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input onkeyup="validarForm()" id="identification" class="identification" name="identification" value="{{ old('identification') }}" />
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
                                    <x-input name="phone" type="number" value="{{ old('phone') }}" />
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
                                    <x-input name="password_confirmation" type="password" />
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
        const inputs = document.querySelectorAll('#formulario input'); //Variable para guardar en un array todos los inputs del formulario

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



        //Registro
        /*
        const formularioRegistro = document.getElementById("formularioRegistro");
        const inputsRegistro = document.querySelectorAll("#formularioRegistro input");

        //Validar
        var cedulaReg;
        var pasaporteReg;
        var nombreReg;
        var apellidosReg;
        var nacionalidadReg;
        var correoReg;
        var telefonoReg;
        var tarjetaReg;
        var CCVREg;
        var fech_venci_Reg;
        var claveReg;


        function validarFormReg(e) {
            switch (e.target.name) {
                case "fCedula":
                    if (expresiones.id.test(e.target.value) && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fCedula").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.id.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fCedula").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fCedula").style.border = "2px solid #f6f6f6";
                    }
                    break;

                case "fPasaporte":
                    if (expresiones.id.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fPasaporte").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.id.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fPasaporte").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fPasaporte").style.border = "2px solid #f6f6f6";
                    }
                    break;

                case "fNombre":
                    if (expresiones.nombre.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fNombre").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.nombre.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fNombre").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fNombre").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fApellidos":
                    if (expresiones.nombre.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fApellidos").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.nombre.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fApellidos").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fApellidos").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fNacionalidad":
                    if (expresiones.nombre.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fNacionalidad").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.nombre.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fNacionalidad").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fNacionalidad").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fEmail":
                    if (expresiones.correo.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fEmail").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.correo.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fEmail").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fEmail").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fTelefono":
                    if (expresiones.telefono.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fTelefono").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.telefono.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fTelefono").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fTelefono").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fTarjeta":
                    if (expresiones.numeros.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fTarjeta").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.numeros.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fTarjeta").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fTarjeta").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fCCV":
                    if (expresiones.CVV.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fCCV").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.CVV.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fCCV").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fCCV").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fVence":
                    if (expresiones.fecha_de_vencimiento.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.value);
                        document.getElementById("fVence").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.fecha_de_vencimiento.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.value);
                        document.getElementById("fVence").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fVence").style.border = "2px solid #f6f6f6";
                    }
                    break;
                case "fPasswordReg":
                    if (expresiones.password.test(e.target.value) == true && e.target.value != "") { //Correcto
                        console.log("Correcto " + e.target.name);
                        document.getElementById("fPasswordReg").style.border = "5px solid springgreen";
                        id = true;
                    }
                    if (expresiones.password.test(e.target.value) == false && e.target.value != "") { //Incorrecto
                        console.log("Incorrecto " + e.target.name);
                        document.getElementById("fPasswordReg").style.border = "5px solid red";
                        id = false;
                    }
                    if (e.target.value == "") {
                        document.getElementById("fPasswordReg").style.border = "2px solid #f6f6f6";
                    }
                    break;
            }
        }

        inputsRegistro.forEach(function(input) {
            input.addEventListener("blur", validarFormReg)
            input.addEventListener("keyup", validarFormReg)
        })
        formularioRegistro.addEventListener("submit", function(e) {
            if (id && clave) {
                alert("Validacion correcta")
            } else {
                alert("Hay campos incorrectos")
            }

        })

        */
    </script>

</x-guest-layout>
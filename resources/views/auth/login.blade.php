<x-guest-layout title="Iniciar Sesión">

    <div class="d-flex justify-content-center">
        <div class="row auth-card">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>

                    <div class="card-body">
                        <form id='form_login' action="/login" method="POST">
                            @csrf

                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8">
                                    <x-input id="identification" name="identification" value="{{ old('identification') }}" />
                                </div>
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <x-input id="identification" name="password" type="password" />
                                </div>
                            </div>

                            {{-- Recordarme --}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                                <label class="form-check-label" for="remember">Recordarme</label>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> &nbsp;
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>

                        <hr>

                        <div class="row">
                            <div class="col mb-3">
                                ¿No tienes una cuenta? Click <a href="{{ route('register') }}" class="link">aquí</a>.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                ¿Olvidaste tu contraseña? Click <a href="{{ route('password.request') }}" class="link">aquí</a>.
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

        jQuery.validator.addMethod("idnumber", function (value, element) {
                if ( /^\d{3}-?\d{3}-?\d{3}$/g.test(value) ) {
                    return true;
                } else {
                    return false;
                };
            }, "La cédula debe tener 9 dígitos ");

        jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
        }, 'Por favor digite solo valores alfanuméricos *',);  

        if($("#form_login").length > 0)
        {
            $('#form_login').validate({
            rules:{
                identification : {
                required : true,
                numbersonly:true,
                idnumber: true         
                },
                password : {
                required : true,
                passwordCheck:true,
                minlength : 8,
                maxlength : 60
                },
            },

            messages : {
                identification : { 
                required : 'Por favor ingrese su cédula *'
                },
                password : {
                required : 'Por favor ingrese su contraseña *',
                minlength : 'La contraseña no debe ser menor a 8 caracteres *',
                maxlength : 'La contraseña no debe ser mayor a 60 caracteres *'
                },
            }
            });
        }
    });

        </script>
    @endpush

</x-guest-layout>

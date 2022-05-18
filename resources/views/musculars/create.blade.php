<x-app-layout title="Nueva Musculación">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('musculars.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="text-center card-header">
                    <h2 class="font-weight-bold ">
                        Nueva Musculación
                    </h2>
                </div>
                {{-- }} @json($errors->all()) --}}
                <div class="card-body">
                    <form id='form_musculars_create' action="{{ route('musculars.store') }}" method="POST">
                        @csrf

                        <div class="mb-3 col-12 text-center">
                            <h4 class="text-center font-weight-bold ">Instrumento de Medición</h4>
                        </div>

                        {{-- Fecha de Toma Datos --}}
                        @php
                            $today = today()->toDateString();
                        @endphp
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha de Cita</label>
                            <div class="col-sm-8">
                                <x-input readonly type="date" name="date" value="{{ $today }}" />
                            </div>
                        </div>

                        {{-- Hora de Toma Datos --}}
                        @php
                            $hour = now()->toTimeString();
                        @endphp
                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label">Hora de Cita</label>
                            <div class="col-sm-8">
                                <x-input readonly type="time" name="time" value="{{ $hour }}" />
                            </div>
                        </div>

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select2 name="athlete_id">
                                    <option disabled {{ old('athlete_id') ? '' : 'selected' }} value=""> --
                                        Seleccione -- </option>
                                    @foreach ($athletes as $athlete)
                                        <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }}
                                            value="{{ $athlete->id }}">
                                            {{ $athlete->user->identification . ' | ' . $athlete->user->name . ' ' . $athlete->user->last_name }}
                                        </option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>

                        {{-- Edad Fisiologica --}}
                        <div class="form-group row">
                            <label for="physiological_age" class="col-sm-4 col-form-label">Edad</label>
                            <div class="col-sm-8">
                                <x-input name="physiological_age" value="{{ old('physiological_age') }}" />
                            </div>
                        </div>

                        {{-- Peso Kg --}}
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Peso Kg</label>
                            <div class="col-sm-8">
                                <x-input name="weight" value="{{ old('weight') }}" />
                            </div>
                        </div>

                        {{-- Altura Cm --}}
                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Altura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="height" value="{{ old('height') }}" />
                            </div>
                        </div>

                        {{-- IMC --}}
                        <div class="form-group row">
                            <label for="bmi" class="col-sm-4 col-form-label">IMC</label>
                            <div class="col-sm-8">
                                <x-input name="bmi" value="{{ old('bmi') }}" />
                            </div>
                        </div>

                        {{-- Circ. Cintura Cm --}}
                        <div class="form-group row">
                            <label for="waist" class="col-sm-4 col-form-label">Circ. Cintura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="waist" value="{{ old('waist') }}" />
                            </div>
                        </div>

                        {{-- Circ. Cadera Cm --}}
                        <div class="form-group row">
                            <label for="hip" class="col-sm-4 col-form-label">Circ. Cadera Cm</label>
                            <div class="col-sm-8">
                                <x-input name="hip" value="{{ old('hip') }}" />
                            </div>
                        </div>

                        {{-- Relacion Cintura Cadera --}}
                        <div class="form-group row">
                            <label for="cint" class="col-sm-4 col-form-label">Relación Cintura Cadera</label>
                            <div class="col-sm-8">
                                <x-input name="cint_code" value="{{ old('cint_code') }}" />
                            </div>
                        </div>

                        <hr>

                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Pliegues</h4>
                        </div>

                        <br>
                        {{-- Tricipital --}}
                        <div class="form-group row">
                            <label for="tricipital" class="col-sm-4 col-form-label">Tricipital</label>
                            <div class="col-sm-8">
                                <x-input name="tricipital" value="{{ old('tricipital') }}" />
                            </div>
                        </div>

                        {{-- Subescapular --}}
                        <div class="form-group row">
                            <label for="subscapular" class="col-sm-4 col-form-label">Subescapular</label>
                            <div class="col-sm-8">
                                <x-input name="subscapular" value="{{ old('subscapular') }}" />
                            </div>
                        </div>

                        {{-- Abdominal --}}
                        <div class="form-group row">
                            <label for="abdominal" class="col-sm-4 col-form-label">Abdominal</label>
                            <div class="col-sm-8">
                                <x-input name="abdominal" value="{{ old('abdominal') }}" />
                            </div>
                        </div>

                        {{-- Suprailiaco --}}
                        <div class="form-group row">
                            <label for="suprailiac" class="col-sm-4 col-form-label">Suprailíaco</label>
                            <div class="col-sm-8">
                                <x-input name="suprailiac" value="{{ old('suprailiac') }}" />
                            </div>
                        </div>

                        {{-- Muslo --}}
                        <div class="form-group row">
                            <label for="thigh" class="col-sm-4 col-form-label">Muslo</label>
                            <div class="col-sm-8">
                                <x-input name="thigh" value="{{ old('thigh') }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla --}}
                        <div class="form-group row">
                            <label for="calf" class="col-sm-4 col-form-label">Pantorrilla</label>
                            <div class="col-sm-8">
                                <x-input name="calf" value="{{ old('calf') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Diámetros</h4>
                        </div>
                        <br>
                        {{-- Muñeca Cm --}}
                        <div class="form-group row">
                            <label for="wrist" class="col-sm-4 col-form-label">Muñeca Cm</label>
                            <div class="col-sm-8">
                                <x-input name="wrist" value="{{ old('wrist') }}" />
                            </div>
                        </div>

                        {{-- Codo Cm --}}
                        <div class="form-group row">
                            <label for="elbow" class="col-sm-4 col-form-label">Codo Cm</label>
                            <div class="col-sm-8">
                                <x-input name="elbow" value="{{ old('elbow') }}" />
                            </div>
                        </div>

                        {{-- Rodilla Cm --}}
                        <div class="form-group row">
                            <label for="knee" class="col-sm-4 col-form-label">Rodilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="knee" value="{{ old('knee') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Anchuras</h4>
                        </div>
                        <br>
                        {{-- Biceps Cm --}}
                        <div class="form-group row">
                            <label for="biceps" class="col-sm-4 col-form-label">Bíceps Cm</label>
                            <div class="col-sm-8">
                                <x-input name="biceps" value="{{ old('biceps') }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla Cm --}}
                        <div class="form-group row">
                            <label for="calf_cm" class="col-sm-4 col-form-label">Pantorrilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="calf_cm" value="{{ old('calf_cm') }}" />
                            </div>
                        </div>

                        <hr>

                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Resultados</h4>
                        </div>

                        <br>
                        {{-- %Grasa --}}
                        <div class="form-group row">
                            <label for="fat" class="col-sm-4 col-form-label">%Grasa</label>
                            <div class="col-sm-8">
                                <x-input name="fat" value="{{ old('fat') }}" />
                            </div>
                        </div>

                        {{-- %Residual --}}
                        <div class="form-group row">
                            <label for="residual" class="col-sm-4 col-form-label">%Residual</label>
                            <div class="col-sm-8">
                                <x-input name="residual" value="{{ old('residual') }}" />
                            </div>
                        </div>

                        {{-- %Óseo --}}
                        <div class="form-group row">
                            <label for="bone" class="col-sm-4 col-form-label">%Óseo</label>
                            <div class="col-sm-8">
                                <x-input name="bone" value="{{ old('bone') }}" />
                            </div>
                        </div>

                        {{-- %Musculo --}}
                        <div class="form-group row">
                            <label for="muscle" class="col-sm-4 col-form-label">%Musculo</label>
                            <div class="col-sm-8">
                                <x-input name="muscle" value="{{ old('muscle') }}" />
                            </div>
                        </div>

                        {{-- %Visceral --}}
                        <div class="form-group row">
                            <label for="visceral" class="col-sm-4 col-form-label">%Visceral</label>
                            <div class="col-sm-8">
                                <x-input name="visceral" value="{{ old('visceral') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Recomendaciones</h4>
                        </div>
                        <br>
                        {{-- Peso Ideal Kg --}}
                        <div class="form-group row">
                            <label for="ideal_weight" class="col-sm-4 col-form-label">Peso Ideal Kg</label>
                            <div class="col-sm-8">
                                <x-input name="ideal_weight" value="{{ old('ideal_weight') }}" />
                            </div>
                        </div>

                        {{-- Requerimiento Calorico --}}
                        <div class="form-group row">
                            <label for="calories" class="col-sm-4 col-form-label">Requerimiento Cal{orico</label>
                            <div class="col-sm-8">
                                <x-input name="calories" value="{{ old('calories') }}" />
                            </div>
                        </div>

                        {{-- IMC Alto --}}
                        <div class="form-group row">
                            <label for="bmi_high" class="col-sm-4 col-form-label">IMC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="bmi_high" value="{{ old('bmi_high') }}" />
                            </div>
                        </div>

                        {{-- ICC Alto --}}
                        <div class="form-group row">
                            <label for="icc_high" class="col-sm-4 col-form-label">ICC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="icc_high" value="{{ old('icc_high') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="text-center ">
                            <h4 class="text-center font-weight-bold ">Acotaciones Extras</h4>
                        </div>

                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos por Mejorar</label>
                            <div class="col-sm-8">
                                <x-textarea name="get_better" value="{{ old('get_better') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Otros Detalles</label>
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
            $(document).ready(function() {
                //Método que valida solo numeros
                jQuery.validator.addMethod("numbersonly", function(value, element) {
                    return this.optional(element) || /^[0-9]+$/i.test(value);
                }, 'Por favor digite solo valores numéricos y números naturales *', );
                //Método que valida enteros y decimales
                jQuery.validator.addMethod("numbersfloatonly", function(value, element) {
                    return this.optional(element) || /^[0-9,.]+$/g.test(value);
                }, 'Por favor digite solo valores numéricos enteros o decimales *', );
                if ($("#form_musculars_create").length > 0) {
                    $('#form_musculars_create').validate({
                        rules: {
                            physiological_age: {
                                required: true,
                                numbersonly: true,
                                maxlength: 2,
                                minlength: 1
                            },
                            weight: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            height: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            bmi: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            waist: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            hip: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            cint_code: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            tricipital: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            subscapular: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            abdominal: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            suprailiac: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            thigh: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            calf: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            wrist: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            elbow: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            knee: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            biceps: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            calf_cm: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 2
                            },
                            fat: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            residual: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            bone: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            muscle: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            visceral: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            ideal_weight: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            calories: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            bmi_high: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                            icc_high: {
                                required: true,
                                numbersfloatonly: true,
                                maxlength: 5,
                                minlength: 1
                            },
                        },
                        messages: {
                            physiological_age: {
                                required: 'Ingrese una edad *',
                                maxlength: 'La edad no puede ser mayor a dos dígitos *',
                                minlength: 'La edad no puede ser menor a 1 *'
                            },
                            weight: {
                                required: 'Ingrese un peso *',
                                maxlength: 'El peso no puede exceder de tres dígitos *',
                                minlength: 'El peso no puede ser de un solo dígito *'
                            },
                            height: {
                                required: 'Ingrese una altura *',
                                maxlength: 'La altura no puede ser mayor a tres dígitos *',
                                minlength: 'La altura no puede ser menor a dos dígitos *'
                            },
                            bmi: {
                                required: 'Ingrese el índice de masa corporal *',
                                maxlength: 'El índice de masa corporal no puede exceder los cinco dígitos *',
                                minlength: 'El índice de masa corporal no puede ser inferior a un dígito *'
                            },
                            waist: {
                                required: 'Ingrese una circunferencia de cintura *',
                                maxlength: 'La circunferencia de cintura no puede ser mayor a cinco dígitos *',
                                minlength: 'La circunferencia de cintura no puede ser menor a dos dígitos *'
                            },
                            hip: {
                                required: 'Ingrese una circunferencia de cadera *',
                                maxlength: 'La circunferencia de cadera no puede ser mayor a cinco dígitos *',
                                minlength: 'La circunferencia de cadera no puede ser menor a dos dígitos *'
                            },
                            cint_code: {
                                required: 'Ingrese una relacion de cintura-cadera *',
                                maxlength: 'La relacion de cintura-cadera no puede ser mayor a cinco dígitos *',
                                minlength: 'La relacion de cintura-cadera no puede ser menor a dos dígitos *'
                            },
                            tricipital: {
                                required: 'Ingrese una medida tricipital *',
                                maxlength: 'La medida tricipitalura no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida tricipital no puede ser menor a dos dígitos *'
                            },
                            subscapular: {
                                required: 'Ingrese una medida subescapular *',
                                maxlength: 'La medida subescapular no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida subescapular no puede ser menor a dos dígitos *'
                            },
                            suprailiac: {
                                required: 'Ingrese una medida suprailíaca *',
                                maxlength: 'La medida suprailíaca no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida suprailíaca no puede ser menor a dos dígitos *'
                            },
                            thigh: {
                                required: 'Ingrese una medida de muslo *',
                                maxlength: 'La medida de muslo no puede ser mayor a cinco dígitos *',
                                minlength: 'La mmedida de muslo no puede ser menor a dos dígitos *'
                            },
                            calf: {
                                required: 'Ingrese una medida de pantorrilla *',
                                maxlength: 'La medida de pantorrilla no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de pantorrilla no puede ser menor a dos dígitos *'
                            },
                            wrist: {
                                required: 'Ingrese una medida de muñeca *',
                                maxlength: 'La medida de muñeca no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de muñeca no puede ser menor a dos dígitos *'
                            },
                            elbow: {
                                required: 'Ingrese una medida de codo *',
                                maxlength: 'La medida de codo no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de codo no puede ser menor a dos dígitos *'
                            },
                            knee: {
                                required: 'Ingrese una medida de rodilla *',
                                maxlength: 'La medida de rodilla no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de rodilla no puede ser menor a dos dígitos *'
                            },
                            biceps: {
                                required: 'Ingrese una medida de bíceps *',
                                maxlength: 'La medida de bíceps no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de bíceps no puede ser menor a dos dígitos *'
                            },
                            calf_cm: {
                                required: 'Ingrese una medida de pantorrilla en centímetros *',
                                maxlength: 'La medida de pantorrilla en centímetros no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de pantorrilla en centímetros no puede ser menor a dos dígitos *'
                            },
                            fat: {
                                required: 'Ingrese una medida de grasa *',
                                maxlength: 'La medida de grasa no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de grasa no puede ser menor a uno dígito *'
                            },
                            residual: {
                                required: 'Ingrese una medida de %residual *',
                                maxlength: 'La medida de %residual no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de %residual no puede ser menor a uno dígito *'
                            },
                            bone: {
                                required: 'Ingrese una medida de % óseo *',
                                maxlength: 'La medida de % óseo no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de % óseo no puede ser menor a uno dígito *'
                            },
                            muscle: {
                                required: 'Ingrese una medida de % muscular  *',
                                maxlength: 'La medida de % muscular  no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de % muscular  no puede ser menor a uno dígito *'
                            },
                            visceral: {
                                required: 'Ingrese una medida de % visceral *',
                                maxlength: 'La medida de % visceral no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de % visceral no puede ser menor a uno dígito *'
                            },
                            ideal_weight: {
                                required: 'Ingrese una medida peso recomendado *',
                                maxlength: 'La medida peso recomendado no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida peso recomendado no puede ser menor a uno dígito *'
                            },
                            calories: {
                                required: 'Ingrese una medida requerimiento calórico *',
                                maxlength: 'La medida requerimiento calórico no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida requerimiento calórico no puede ser menor a uno dígito *'
                            },
                            bmi_high: {
                                required: 'Ingrese una medida de IMC *',
                                maxlength: 'La medida de IMC no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de IMC no puede ser menor a uno dígito *'
                            },
                            icc_high: {
                                required: 'Ingrese una medida de ICC *',
                                maxlength: 'La medida de ICC no puede ser mayor a cinco dígitos *',
                                minlength: 'La medida de ICC no puede ser menor a uno dígito *'
                            },
                        },
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>

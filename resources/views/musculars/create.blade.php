<x-app-layout title="Crear Documento">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('musculars.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Generar Sesión
                </div>
                @json($errors->all())
                <div class="card-body">
                    <form action="{{ route('musculars.store') }}" method="POST">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Instrumento de Medición</label>
                        </div>

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-select name="athlete_id">
                                    <option disabled {{ old('athlete_id') ? '' : 'selected' }} value=""> --
                                        Seleccione -- </option>
                                    @foreach ($athletes as $athlete)
                                        <option {{ old('athlete_id') == $athlete->id ? 'selected' : '' }}
                                            value="{{ $athlete->id }}">
                                            {{ $athlete->user->identification . ' | ' . $athlete->user->name . ' ' . $athlete->user->last_name }}
                                        </option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Fecha de Toma Datos --}}
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha de Cita</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="date" value="{{ old('date') }}" />
                            </div>
                        </div>


                        {{-- Edad Fisiologica --}}
                        <div class="form-group row">
                            <label for="physiological_age" class="col-sm-4 col-form-label">Edad</label>
                            <div class="col-sm-8">
                                <x-input name="physiological_age" type="number"
                                    value="{{ old('physiological_age') }}" />
                            </div>
                        </div>

                        {{-- Peso Kg --}}
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Peso Kg</label>
                            <div class="col-sm-8">
                                <x-input name="weight" type="number" value="{{ old('weight') }}" />
                            </div>
                        </div>

                        {{-- Altura Cm --}}
                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Altura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="height" type="number" value="{{ old('height') }}" />
                            </div>
                        </div>

                        {{-- IMC --}}
                        <div class="form-group row">
                            <label for="bmi" class="col-sm-4 col-form-label">IMC</label>
                            <div class="col-sm-8">
                                <x-input name="bmi" type="number" value="{{ old('bmi') }}" />
                            </div>
                        </div>

                        {{-- Circ. Cintura Cm --}}
                        <div class="form-group row">
                            <label for="waist" class="col-sm-4 col-form-label">Circ. Cintura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="waist" type="number" value="{{ old('waist') }}" />
                            </div>
                        </div>

                        {{-- Circ. Cadera Cm --}}
                        <div class="form-group row">
                            <label for="hip" class="col-sm-4 col-form-label">Circ. Cadera Cm</label>
                            <div class="col-sm-8">
                                <x-input name="hip" type="number" value="{{ old('hip') }}" />
                            </div>
                        </div>

                        {{-- Relacion Cintura Cadera --}}
                        <div class="form-group row">
                            <label for="cint" class="col-sm-4 col-form-label">Relacion Cintura Cadera</label>
                            <div class="col-sm-8">
                                <x-input name="cint_code" type="number" value="{{ old('cint_code') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pliegues</label>
                        </div>
                        <br>
                        {{-- Tricipital --}}
                        <div class="form-group row">
                            <label for="tricipital" class="col-sm-4 col-form-label">Tricipital</label>
                            <div class="col-sm-8">
                                <x-input name="tricipital" type="number" value="{{ old('tricipital') }}" />
                            </div>
                        </div>

                        {{-- Subescapular --}}
                        <div class="form-group row">
                            <label for="subscapular" class="col-sm-4 col-form-label">Subescapular</label>
                            <div class="col-sm-8">
                                <x-input name="subscapular" type="number" value="{{ old('subscapular') }}" />
                            </div>
                        </div>

                        {{-- Abdominal --}}
                        <div class="form-group row">
                            <label for="abdominal" class="col-sm-4 col-form-label">Abdominal</label>
                            <div class="col-sm-8">
                                <x-input name="abdominal" type="number" value="{{ old('abdominal') }}" />
                            </div>
                        </div>

                        {{-- Suprailiaco --}}
                        <div class="form-group row">
                            <label for="suprailiac" class="col-sm-4 col-form-label">Suprailiaco</label>
                            <div class="col-sm-8">
                                <x-input name="suprailiac" type="number" value="{{ old('suprailiac') }}" />
                            </div>
                        </div>

                        {{-- Muslo --}}
                        <div class="form-group row">
                            <label for="thigh" class="col-sm-4 col-form-label">Muslo</label>
                            <div class="col-sm-8">
                                <x-input name="thigh" type="number" value="{{ old('thigh') }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla --}}
                        <div class="form-group row">
                            <label for="calf" class="col-sm-4 col-form-label">Pantorrilla</label>
                            <div class="col-sm-8">
                                <x-input name="calf" type="number" value="{{ old('calf') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Diametros</label>
                        </div>
                        <br>
                        {{-- Muñeca Cm --}}
                        <div class="form-group row">
                            <label for="wrist" class="col-sm-4 col-form-label">Muñeca Cm</label>
                            <div class="col-sm-8">
                                <x-input name="wrist" type="number" value="{{ old('wrist') }}" />
                            </div>
                        </div>

                        {{-- Codo Cm --}}
                        <div class="form-group row">
                            <label for="elbow" class="col-sm-4 col-form-label">Codo Cm</label>
                            <div class="col-sm-8">
                                <x-input name="elbow" type="number" value="{{ old('elbow') }}" />
                            </div>
                        </div>

                        {{-- Rodilla Cm --}}
                        <div class="form-group row">
                            <label for="knee" class="col-sm-4 col-form-label">Rodilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="knee" type="number" value="{{ old('knee') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Anchuras</label>
                        </div>
                        <br>
                        {{-- Biceps Cm --}}
                        <div class="form-group row">
                            <label for="biceps" class="col-sm-4 col-form-label">Biceps Cm</label>
                            <div class="col-sm-8">
                                <x-input name="biceps" type="number" value="{{ old('biceps') }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla Cm --}}
                        <div class="form-group row">
                            <label for="calf_cm" class="col-sm-4 col-form-label">Pantorrilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="calf_cm" type="number" value="{{ old('calf_cm') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Resultados</label>
                        </div>
                        <br>
                        {{-- %Grasa --}}
                        <div class="form-group row">
                            <label for="fat" class="col-sm-4 col-form-label">%Grasa</label>
                            <div class="col-sm-8">
                                <x-input name="fat" type="number" value="{{ old('fat') }}" />
                            </div>
                        </div>

                        {{-- %Residual --}}
                        <div class="form-group row">
                            <label for="residual" class="col-sm-4 col-form-label">%Residual</label>
                            <div class="col-sm-8">
                                <x-input name="residual" type="number" value="{{ old('residual') }}" />
                            </div>
                        </div>

                        {{-- %Óseo --}}
                        <div class="form-group row">
                            <label for="bone" class="col-sm-4 col-form-label">%Óseo</label>
                            <div class="col-sm-8">
                                <x-input name="bone" type="number" value="{{ old('bone') }}" />
                            </div>
                        </div>

                        {{-- %Musculo --}}
                        <div class="form-group row">
                            <label for="muscle" class="col-sm-4 col-form-label">%Musculo</label>
                            <div class="col-sm-8">
                                <x-input name="muscle" type="number" value="{{ old('muscle') }}" />
                            </div>
                        </div>

                        {{-- %Visceral --}}
                        <div class="form-group row">
                            <label for="visceral" class="col-sm-4 col-form-label">%Visceral</label>
                            <div class="col-sm-8">
                                <x-input name="visceral" type="number" value="{{ old('visceral') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Recomendaciones</label>
                        </div>
                        <br>
                        {{-- Peso Ideal Kg --}}
                        <div class="form-group row">
                            <label for="ideal_weight" class="col-sm-4 col-form-label">Peso Ideal Kg</label>
                            <div class="col-sm-8">
                                <x-input name="ideal_weight" type="number" value="{{ old('ideal_weight') }}" />
                            </div>
                        </div>

                        {{-- Requerimiento Calorico --}}
                        <div class="form-group row">
                            <label for="calories" class="col-sm-4 col-form-label">Requerimiento Calorico</label>
                            <div class="col-sm-8">
                                <x-input name="calories" type="number" value="{{ old('calories') }}" />
                            </div>
                        </div>

                        {{-- IMC Alto --}}
                        <div class="form-group row">
                            <label for="bmi_high" class="col-sm-4 col-form-label">IMC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="bmi_high" type="number" value="{{ old('bmi_high') }}" />
                            </div>
                        </div>

                        {{-- ICC Alto --}}
                        <div class="form-group row">
                            <label for="icc_high" class="col-sm-4 col-form-label">ICC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="icc_high" type="number" value="{{ old('icc_high') }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Acotacciones Extras</label>
                        </div>

                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos por Mejorar</label>
                            <x-textarea placeholder="Aspectos por mejorar" name="get_better" cols="30" rows="5"
                                value="{{ old('get_better') }}" />
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Otros Detalles</label>
                            <x-textarea placeholder="Otros Detalles" name="details" cols="30" rows="5"
                                value="{{ old('details') }}" />
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
    </div>
    </div>
</x-app-layout>

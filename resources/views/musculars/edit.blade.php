<x-app-layout title="Editar Documento">

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
                    Editar Sesión
                </div>
                <div class="card-body">
                    <form action="{{ route('musculars.update', $muscular->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Instrumento de Medición</label>
                        </div>

                        {{-- Fecha de Toma Datos --}}
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Fecha de Cita</label>
                            <div class="col-sm-8">
                                <x-input readonly type="date" name="date" value="{{old('date') ?? $muscular->date }}" />
                            </div>
                        </div>

                        {{-- Hora de Toma Datos --}}
                        @php
                        $hour = now()->toTimeString();
                        @endphp
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Hora de Cita</label>
                            <div class="col-sm-8">
                                <x-input readonly type="time" name="time" value="{{old('time') ?? $muscular->time }}" />
                            </div>
                        </div>

                        {{-- Atleta --}}
                        <div class="form-group row">
                            <label for="athlete_id" class="col-sm-4 col-form-label">Atleta</label>
                            <div class="col-sm-8">
                                <x-input name="athlete_id" readonly value="{{$muscular->athlete->user->full_name }}">
                                </x-input>
                            </div>
                        </div>

                        {{-- Edad Fisiologica --}}
                        <div class="form-group row">
                            <label for="physiological_age" class="col-sm-4 col-form-label">Edad</label>
                            <div class="col-sm-8">
                                <x-input name="physiological_age" type="number" value="{{old('physiological_age') ?? $muscular->physiological_age }}" />
                            </div>
                        </div>

                        {{-- Peso Kg --}}
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Peso Kg</label>
                            <div class="col-sm-8">
                                <x-input name="weight" type="number" value="{{old('weight') ?? $muscular->weight }}" />
                            </div>
                        </div>

                        {{-- Altura Cm --}}
                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Altura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="height" type="number" value="{{old('height') ??  $muscular->height }}" />
                            </div>
                        </div>

                        {{-- IMC --}}
                        <div class="form-group row">
                            <label for="bmi" class="col-sm-4 col-form-label">IMC</label>
                            <div class="col-sm-8">
                                <x-input name="bmi" type="number" value="{{old('bmi') ?? $muscular->bmi }}" />
                            </div>
                        </div>

                        {{-- Circ. Cintura Cm --}}
                        <div class="form-group row">
                            <label for="waist" class="col-sm-4 col-form-label">Circ. Cintura Cm</label>
                            <div class="col-sm-8">
                                <x-input name="waist" type="number" value="{{ old('waist') ?? $muscular->waist }}" />
                            </div>
                        </div>

                        {{-- Circ. Cadera Cm --}}
                        <div class="form-group row">
                            <label for="hip" class="col-sm-4 col-form-label">Circ. Cadera Cm</label>
                            <div class="col-sm-8">
                                <x-input name="hip" type="number" value="{{old('hip') ?? $muscular->hip }}" />
                            </div>
                        </div>

                        {{-- Relacion Cintura Cadera --}}
                        <div class="form-group row">
                            <label for="cint" class="col-sm-4 col-form-label">Relación Cintura Cadera</label>
                            <div class="col-sm-8">
                                <x-input name="cint_code" type="number" value="{{old('cint_code') ?? $muscular->cint_code }}" />
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
                                <x-input name="tricipital" type="number" value="{{old('tricipital') ?? $muscular->tricipital }}" />
                            </div>
                        </div>

                        {{-- Subescapular --}}
                        <div class="form-group row">
                            <label for="subscapular" class="col-sm-4 col-form-label">Subescapular</label>
                            <div class="col-sm-8">
                                <x-input name="subscapular" type="number" value="{{old('subscapular') ?? $muscular->subscapular }}" />
                            </div>
                        </div>

                        {{-- Abdominal --}}
                        <div class="form-group row">
                            <label for="abdominal" class="col-sm-4 col-form-label">Abdominal</label>
                            <div class="col-sm-8">
                                <x-input name="abdominal" type="number" value="{{old('abdominal') ?? $muscular->abdominal }}" />
                            </div>
                        </div>

                        {{-- Suprailiaco --}}
                        <div class="form-group row">
                            <label for="suprailiac" class="col-sm-4 col-form-label">Suprailíaco</label>
                            <div class="col-sm-8">
                                <x-input name="suprailiac" type="number" value="{{old('suprailiac') ?? $muscular->suprailiac }}" />
                            </div>
                        </div>

                        {{-- Muslo --}}
                        <div class="form-group row">
                            <label for="thigh" class="col-sm-4 col-form-label">Muslo</label>
                            <div class="col-sm-8">
                                <x-input name="thigh" type="number" value="{{ old('thigh') ?? $muscular->thigh }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla --}}
                        <div class="form-group row">
                            <label for="calf" class="col-sm-4 col-form-label">Pantorrilla</label>
                            <div class="col-sm-8">
                                <x-input name="calf" type="number" value="{{old('calf') ?? $muscular->calf }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Diámetros</label>
                        </div>
                        <br>
                        {{-- Muñeca Cm --}}
                        <div class="form-group row">
                            <label for="wrist" class="col-sm-4 col-form-label">Muñeca Cm</label>
                            <div class="col-sm-8">
                                <x-input name="wrist" type="number" value="{{old('wrist') ?? $muscular->wrist }}" />
                            </div>
                        </div>

                        {{-- Codo Cm --}}
                        <div class="form-group row">
                            <label for="elbow" class="col-sm-4 col-form-label">Codo Cm</label>
                            <div class="col-sm-8">
                                <x-input name="elbow" type="number" value="{{old('elbow') ?? $muscular->elbow }}" />
                            </div>
                        </div>

                        {{-- Rodilla Cm --}}
                        <div class="form-group row">
                            <label for="knee" class="col-sm-4 col-form-label">Rodilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="knee" type="number" value="{{old('knee') ?? $muscular->knee }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Anchuras</label>
                        </div>
                        <br>
                        {{-- Biceps Cm --}}
                        <div class="form-group row">
                            <label for="biceps" class="col-sm-4 col-form-label">Bíceps Cm</label>
                            <div class="col-sm-8">
                                <x-input name="biceps" type="number" value="{{old('biceps') ?? $muscular->biceps }}" />
                            </div>
                        </div>

                        {{-- Pantorrilla Cm --}}
                        <div class="form-group row">
                            <label for="calf_cm" class="col-sm-4 col-form-label">Pantorrilla Cm</label>
                            <div class="col-sm-8">
                                <x-input name="calf_cm" type="number" value="{{old('calf_cm') ?? $muscular->calf_cm }}" />
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
                                <x-input name="fat" type="number" value="{{old('fat') ?? $muscular->fat }}" />
                            </div>
                        </div>

                        {{-- %Residual --}}
                        <div class="form-group row">
                            <label for="residual" class="col-sm-4 col-form-label">%Residual</label>
                            <div class="col-sm-8">
                                <x-input name="residual" type="number" value="{{old('residual') ?? $muscular->residual }}" />
                            </div>
                        </div>

                        {{-- %Óseo --}}
                        <div class="form-group row">
                            <label for="bone" class="col-sm-4 col-form-label">%Óseo</label>
                            <div class="col-sm-8">
                                <x-input name="bone" type="number" value="{{old('bone') ?? $muscular->bone }}" />
                            </div>
                        </div>

                        {{-- %Musculo --}}
                        <div class="form-group row">
                            <label for="muscle" class="col-sm-4 col-form-label">%Musculo</label>
                            <div class="col-sm-8">
                                <x-input name="muscle" type="number" value="{{old('muscle') ?? $muscular->muscle }}" />
                            </div>
                        </div>

                        {{-- %Visceral --}}
                        <div class="form-group row">
                            <label for="visceral" class="col-sm-4 col-form-label">%Visceral</label>
                            <div class="col-sm-8">
                                <x-input name="visceral" type="number" value="{{old('visceral') ?? $muscular->visceral }}" />
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
                                <x-input name="ideal_weight" type="number" value="{{old('ideal_weight') ?? $muscular->ideal_weight }}" />
                            </div>
                        </div>

                        {{-- Requerimiento Calorico --}}
                        <div class="form-group row">
                            <label for="calories" class="col-sm-4 col-form-label">Requerimiento Calórico</label>
                            <div class="col-sm-8">
                                <x-input name="calories" type="number" value="{{old('calories') ?? $muscular->calories }}" />
                            </div>
                        </div>

                        {{-- IMC Alto --}}
                        <div class="form-group row">
                            <label for="bmi_high" class="col-sm-4 col-form-label">IMC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="bmi_high" type="number" value="{{old('bmi_high') ?? $muscular->bmi_high }}" />
                            </div>
                        </div>

                        {{-- ICC Alto --}}
                        <div class="form-group row">
                            <label for="icc_high" class="col-sm-4 col-form-label">ICC Alto</label>
                            <div class="col-sm-8">
                                <x-input name="icc_high" type="number" value="{{ old('icc_high') ?? $muscular->icc_high }}" />
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Acotaciones Extras</label>
                        </div>

                        <div class="form-group row">
                            <label for="get_better" class="col-sm-4 col-form-label">Aspectos por Mejorar</label>
                            <div class="col-sm-8">
                                <x-textarea placeher="Aspectos por mejorar" name="get_better" cols="30" rows="5" value="{{old('get_better') ?? $muscular->get_better }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label">Otros Detalles</label>
                            <div class="col-sm-8">
                                <x-editor name="details" value="{!! $muscular->details !!}" />
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
    </div>
    </div>
</x-app-layout>

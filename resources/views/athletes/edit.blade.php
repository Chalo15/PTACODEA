<x-app-layout title="Editar Atleta">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('athletes.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-5">
                <div class="card-header">
                    Editar Atleta
                </div>

                <div class="card-body">
                    <form action="{{ route('athletes.update', $athlete->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <div>
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                    <div class="col-sm-8">
                                        <x-input name="identification" value="{{  $athlete->user->identification }}" />
                                    </div>
                                </div>

                                {{-- Nombre --}}
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                    <div class="col-sm-8">
                                        <x-input name="name" value="{{ $athlete->user->name }}" />
                                    </div>
                                </div>

                                {{-- Apellidos --}}
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-4 col-form-label">Apellidos</label>
                                    <div class="col-sm-8">
                                        <x-input name="last_name" value="{{ $athlete->user->last_name }}" />
                                    </div>
                                </div>

                                {{-- Fecha de Nacimiento --}}
                                <div class="form-group row">
                                    <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-8">
                                        <x-input type="date" name="birthdate" value="{{ $athlete->user->birthdate }}" />
                                    </div>
                                </div>


                                {{-- Provincia --}}
                                <div class="form-group row">
                                    <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                                    <div class="col-sm-8">
                                        <x-select name="province">
                                            <option {{ $athlete->user->province ? '' : 'selected' }} value=""> -- Seleccione --
                                            </option>
                                            @foreach ($provinces as $province)
                                            <option {{ $athlete->user->province == $province ? 'selected' : '' }} value="{{ $province }}">{{ $province }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Ciudad --}}
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                                    <div class="col-sm-8">
                                        <x-input name="city" value="{{ $athlete->user->city }}" />
                                    </div>
                                </div>


                                <hr>

                                {{-- Correo Electrónico --}}
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-8">
                                        <x-input type="email" name="email" value="{{ $athlete->user->email }}" />
                                    </div>
                                </div>


                                {{-- Teléfono --}}
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        <x-input name="phone" type="number" value="{{ $athlete->user->phone }}" />
                                    </div>
                                </div>

                                {{-- Dirección Exacta --}}
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="address">
                                            {{ $athlete->user->address }}
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
                                            <input class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ $athlete->user->gender }}">
                                            <label class="custom-control-label" for="gender-{{ $loop->index }}">
                                                {{ $gender }}
                                            </label>
                                        </div>
                                        @endforeach
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
                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de contraseña</label>
                                    <div class="col-sm-8">
                                        <x-input name="password_confirmation" type="password" />
                                    </div>
                                </div>
                            </div>


                            <hr>

                            {{-- Disciplina --}}
                            {{-- <div class="form-group row">
                                <label for="sport_id" class="col-sm-4 col-form-label">Deporte</label>
                                <div class="col-sm-8">
                                    <x-select2 name="sport_id">
                                        <option disabled {{ $athlete->sport->description ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                            @foreach ($sports as $sport)
                            <option {{ old('sport_id') == $sport->description ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                            @endforeach
                            </x-select2>
                        </div>
                </div> --}}
                <div class="form-group row">
                    <label for="coach_id" class="col-sm-4 col-form-label">Instructor</label>
                    <div class="col-sm-8">
                        <x-select2 name="coach_id">
                            <option disabled value=""> -- Seleccione -- </option>
                            @foreach ($coaches as $coach)
                            <option {{ $athlete->coach->id == $coach->id ? 'selected' : '' }} value="{{ $coach->id }}">{{ $coach->user->identification . ' | ' . $coach->user->full_name }}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>




                {{-- Tipo de Sangre --}}
                <div class="form-group row">
                    <label for="blood" class="col-sm-4 col-form-label">Tipo de Sangre</label>
                    <div class="col-sm-8">
                        <x-select name="blood">
                            <option disabled {{ old('blood') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                            @foreach ($bloods as $blood)
                            <option {{ $athlete->blood == $blood ? 'selected' : '' }} value="{{ $athlete->blood }}">{{ $blood }}</option>
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
                            <input class="custom-control-input" type="radio" name="laterality" id="laterality-{{ $loop->index }}" value="{{ $athlete->laterality }}">
                            <label class="custom-control-label" for="laterality-{{ $loop->index }}">
                                {{ $laterality }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr>
                <div x-data="{ isOpen: {{$athlete->identification_manager ? 'true' : 'false' }} }">

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_younger" id="is_younger" x-model="isOpen">
                        <label class="form-check-label" for="is_younger">
                            ¿El atleta es menor de edad?
                        </label>
                    </div>

                    <div x-show="isOpen">

                        <div class="row">
                            <div class="col mb-3 d-flex justify-content-center">
                                Información del Responsable
                            </div>
                        </div>

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification_manager" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                            <div class="col-sm-8">
                                <x-input name="identification_manager" value="{{ $athlete->identification_manager }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name_manager" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <x-input name="name_manager" value="{{ $athlete->name_manager }}" />
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="lastname_manager" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <x-input name="lastname_manager" value="{{ $athlete->lastname_manager }}" />
                            </div>
                        </div>

                        {{-- Teléfono --}}
                        <div class="form-group row">
                            <label for="contact_manager" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <x-input name="contact_manager" type="number" value="{{ $athlete->contact_manager }}" />
                            </div>
                        </div>

                        {{-- Parentezco --}}
                        <div class="form-group row">
                            <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                            <div class="col-sm-8">
                                <x-select name="manager">
                                    <option disabled {{ $athlete->manager ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($relationships as $relationship)
                                    <option {{ $athlete->manager == $relationship ? 'selected' : '' }} value="{{ $relationship }}">{{ $relationship }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Número de Póliza --}}
                        <div class="form-group row">
                            <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                            <div class="col-sm-8">
                                <x-input name="policy" type="number" value="{{ $athlete->policy }}" />
                            </div>
                        </div>

                        {{-- Fotocópia de Cédula --}}
                        <div class="form-group row">
                            <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                            <div class="col-sm-8">

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="url" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="identification_image">Elija el archivo </label>
                                    </div>
                                </div>

                            </div>
                        </div>v>
                    </div>
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

</x-app-layout>

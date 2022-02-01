<x-app-layout title="Nuevo Atleta">

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
                    Crear Atleta
                </div>

                <div class="card-body">
                    <form action="{{ route('athletes.store') }}" method="POST">
                        @csrf

                        <div x-data="{ isOpen: {{ old('is_user') ? 'true' : 'false' }} }">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_user" id="is_user" x-model="isOpen">
                                <label class="form-check-label" for="is_user">
                                    ¿El usuario se encuentra registrado en el sistema?
                                </label>
                            </div>

                            <hr>

                            <div x-show="isOpen">
                                {{-- Usuario --}}
                                <div class="form-group row">
                                    <label for="user_id" class="col-sm-4 col-form-label">Usuario</label>
                                    <div class="col-sm-8">
                                        <x-select2 name="user_id">
                                            <option disabled {{ old('user_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                            @foreach ($users as $user)
                                            <option {{ old('user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->identification . ' | ' . $user->name . " " . $user->last_name }}</option>
                                            @endforeach
                                        </x-select2>
                                    </div>
                                </div>
                            </div>

                            <div x-show="!isOpen">
                                {{-- Cédula de Identidad o DIMEX --}}
                                <div class="form-group row">
                                    <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o DIMEX</label>
                                    <div class="col-sm-8">
                                        <x-input name="identification" value="{{ old('identification') }}" />
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

                                {{-- Provincia --}}
                                <div class="form-group row">
                                    <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                                    <div class="col-sm-8">
                                        <x-select name="province">
                                            <option disabled {{ old('province') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                            @foreach ($provinces as $province)
                                            <option {{ old('province') == $province ? 'selected' : '' }} value="{{ $province }}">{{ $province }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Ciudad --}}
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                                    <div class="col-sm-8">
                                        <x-input name="city" value="{{ old('city') }}" />
                                    </div>
                                </div>

                                <hr>

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

                                {{-- Dirección Exacta --}}
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">Dirección</label>
                                    <div class="col-sm-8">
                                        <x-textarea name="address">
                                            {{ old('address') }}
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
                                            <input {{ (old('gender') && old('gender') == $gender ) || !old('gender') && $loop->index == 0 ? 'checked' : '' }} class="custom-control-input" type="radio" name="gender" id="gender-{{ $loop->index }}" value="{{ $gender }}">
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
                        </div>

                        <hr>

                        {{-- Disciplina --}}
                        <div class="form-group row">
                            <label for="coach_id" class="col-sm-4 col-form-label">Deporte</label>
                            <div class="col-sm-8">
                                <x-select2 name="sport_id">
                                    <option disabled {{ old('sport_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($sports as $sport)
                                    <option {{ old('sport_id') == $sport->description ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>

                        {{-- Entrenadores --}}
                        <div class="form-group row">
                            <label for="coach_id" class="col-sm-4 col-form-label">Instructor</label>
                            <div class="col-sm-8">
                                <x-select2 name="coach_id">
                                    <option disabled {{ old('coach_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($coaches as $coach)
                                    <option {{ old('coach_id') == $coach->id ? 'selected' : '' }} value="{{ $coach->id }}">{{ $coach->user->full_name }}</option>
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
                                    <option {{ old('blood') == $blood ? 'selected' : '' }} value="{{ $blood }}">{{ $blood }}</option>
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
                                    <input {{ (old('laterality') && old('laterality') == $laterality ) || !old('laterality') && $loop->index == 0 ? 'checked' : '' }} class="custom-control-input" type="radio" name="laterality" id="laterality-{{ $loop->index }}" value="{{ $laterality }}">
                                    <label class="custom-control-label" for="laterality-{{ $loop->index }}">
                                        {{ $laterality }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <hr>

                        <div x-data="{ isOpen: {{ old('is_younger') ? 'true' : 'false' }} }">

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
                                        <x-input name="identification_manager" value="{{ old('identification_manager') }}" />
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
                                        <x-input name="contact_manager" type="number" value="{{ old('contact_manager') }}" />
                                    </div>
                                </div>

                                {{-- Parentezco --}}
                                <div class="form-group row">
                                    <label for="manager" class="col-sm-4 col-form-label">Parentezco</label>
                                    <div class="col-sm-8">
                                        <x-select name="manager">
                                            <option disabled {{ old('manager') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                            @foreach ($relationships as $relationship)
                                            <option {{ old('manager') == $relationship ? 'selected' : '' }} value="{{ $relationship }}">{{ $relationship }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Número de Póliza --}}
                                <div class="form-group row">
                                    <label for="policy" class="col-sm-4 col-form-label">Número de Póliza</label>
                                    <div class="col-sm-8">
                                        <x-input name="policy" type="number" value="{{ old('policy') }}" />
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

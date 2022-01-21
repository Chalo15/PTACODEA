<x-app-layout title="Crear Documento">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Crear Documento
                </div>

                <div class="card-body">
                    <form action="{{ route('physios.store') }}" method="POST">
                        @csrf


                        <div class="form-group row">
                            <label for="user_id" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-8">
                                <x-select name="user_id">
                                    <option disabled {{ old('user_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                    @foreach ($athletes as $athlete)
                                    <option {{ old('user_id') == $athlete->user->id ? 'selected' : '' }} value="{{ $athlete->user->id }}">{{ $athlete->user->identification . ' | ' . $athlete->user->name . " " . $athlete->user->last_name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>

                        {{-- Fecha de Nacimiento --}}
                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Documento</label>
                            <div class="col-sm-8">
                                <x-input type="date" name="birthdate" value="{{ old('birthdate') }}" />
                            </div>
                        </div>


                        {{-- Ciudad --}}
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">Ciudad</label>
                            <div class="col-sm-8">
                                <x-input name="city" value="{{ old('city') }}" />
                            </div>
                        </div>

                </div>
            </div>

            <hr>

            {{-- Años de Experiencia --}}
            <div class="form-group row">
                <label for="experience" class="col-sm-4 col-form-label">Años de Experiencia</label>
                <div class="col-sm-8">
                    <x-input name="experience" type="number" value="{{ old('experience') }}" />
                </div>
            </div>

            {{-- Número de Contrato --}}
            <div class="form-group row">
                <label for="contract_number" class="col-sm-4 col-form-label">Número de Contrato</label>
                <div class="col-sm-8">
                    <x-input name="contract_number" type="number" value="{{ old('contract_number') }}" />
                </div>
            </div>

            {{-- Año de Contrato --}}
            <div class="form-group row">
                <label for="contract_year" class="col-sm-4 col-form-label">Año de Contrato</label>
                <div class="col-sm-8">
                    <x-input name="contract_year" type="number" value="{{ old('contract_year') }}" />
                </div>
            </div>



            {{-- Role --}}
            <div x-data="{ role: '{{ old('role_id') ?? '' }}' }">

                <div class="form-group row">
                    <label for="role" class="col-sm-4 col-form-label">Rol</label>
                    <div class="col-sm-8">
                        <x-select name="role_id" x-model="role">
                            <option disabled value=""> -- Seleccione -- </option>
                            @foreach ($roles as $role)

                            @if($role->id == 4)
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
                                <option disabled {{ old('sport_id') ? '' : 'selected' }} value=""> -- Seleccione -- </option>
                                @foreach ($sports as $sport)
                                <option {{ old('sport_id') == $sport->id ? 'selected' : '' }} value="{{ $sport->id }}">{{ $sport->description }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    {{-- Teléfono Celular --}}
                    <div class="form-group row">
                        <label for="cellphone" class="col-sm-4 col-form-label">Teléfono Celular</label>
                        <div class="col-sm-8">
                            <x-input name="cellphone" type="number" value="{{ old('cellphone') }}" />
                        </div>
                    </div>

                    {{-- Fotocópia de Cédula --}}
                    <div class="form-group row">
                        <label for="file" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                        <div class="col-sm-8">

                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input name="identification_image" type="file" class="custom-file-input" id="identification_image" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="identification_image">Elija el archivo </label>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr>


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

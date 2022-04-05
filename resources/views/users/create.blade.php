<x-app-layout title="Nuevo Usuario">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Nuevo Usuario
                </div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="user-form">
                        @csrf

                        {{-- Cédula de Identidad o DIMEX --}}
                        <div class="form-group row">
                            <label for="identification" class="col-sm-4 col-form-label">Cédula de Identidad o
                                DIMEX</label>
                            <div class="col-sm-8">
                                <x-input name="identification" value="{{ old('identification') }}" />
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
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

                        @php
                            $today = today()->toDateString();
                            $age = today()
                                ->subYears(18)
                                ->toDateString();
                        @endphp

                        <div class="form-group row">
                            <label for="birthdate" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                            <div class="col-sm-8">
                                <x-input type="date" max="{{ $age }}" name="birthdate"
                                    value="{{ old('birthdate') }}" />
                            </div>
                        </div>

                        {{-- Provincia --}}
                        <div class="form-group row">
                            <label for="province" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <x-select name="province">
                                    <option {{ old('province') ? '' : 'selected' }} value=""> -- Seleccione --
                                    </option>
                                    @foreach ($provinces as $province)
                                        <option {{ old('province') == $province ? 'selected' : '' }}
                                            value="{{ $province }}">{{ $province }}</option>
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

                        <hr>

                        {{-- Role --}}
                        <div x-data="{ role: '{{ old('role_id') ?? '' }}' }">

                            <div class="form-group row">
                                <label for="role_id" class="col-sm-4 col-form-label">Rol</label>
                                <div class="col-sm-8">
                                    <x-select name="role_id" x-model="role">
                                        <option disabled value=""> -- Seleccione -- </option>
                                        @foreach ($roles as $role)
                                            @if ($role->id == 4)
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
                                            <option disabled {{ old('sport_id') ? '' : 'selected' }} value=""> --
                                                Seleccione -- </option>
                                            @foreach ($sports as $sport)
                                                <option {{ old('sport_id') == $sport->id ? 'selected' : '' }}
                                                    value="{{ $sport->id }}">{{ $sport->description }}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>

                                {{-- Teléfono Celular --}}
                                <div class="form-group row">
                                    <label for="other_phone" class="col-sm-4 col-form-label">Teléfono Celular</label>
                                    <div class="col-sm-8">
                                        <x-input name="other_phone" type="number" value="{{ old('other_phone') }}" />
                                    </div>
                                </div>

                                {{-- Fotocópia de Cédula --}}
                                <div class="form-group row">
                                    <label for="pdf" class="col-sm-4 col-form-label">Fotocopia de Cédula</label>
                                    <div class="col-sm-8">
                                        <x-input name="pdf" type="file" />
                                    </div>
                                </div>
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
                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirmación de
                                contraseña</label>
                            <div class="col-sm-8">
                                <x-input name="password_confirmation" type="password" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" id="guardarBtn">
                                <i class="fas fa-save"></i> &nbsp;
                                Guardar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        const form = document.getElementById('user-form');
        const sendBtn = document.getElementById('guardarBtn');
        console.log('form', form);
    </script>
</x-app-layout>


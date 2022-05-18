<x-app-layout title="Información del Usuario">

    <div class="row">
        <div class="col mb-3">
            <div class="row">
                <div class="col">
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        <i class="fas fa-reply"></i> &nbsp;
                        Atrás
                    </a>
                </div>

                <div class="col d-flex justify-content-end">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-gray-codea">
                        <i class="fas fa-edit"></i> &nbsp;
                        Editar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            Foto de Perfil
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <img src="{{ $user->photo ? asset($user->photo) : asset('images/default.png') }}" class="rounded mx-auto d-block" width="200" height="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->role_id == 2)
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            Copia de Cédula de Identidad
                        </div>
                        <div class="card-body text-center">
                            <a target="_black" href="{{ asset($user->coach->url) }}" class="btn btn-primary">
                                <i class="fas fa-download"></i> &nbsp;
                                Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Información del Usuario
                        </div>

                        <div class="card-body">
                            {{-- Cédula de Identidad o DIMEX --}}
                            <div class="form-group row">
                                <label for="identification" class="col-sm-4 col-lg-12 col-form-label">Cédula de Identidad o DIMEX</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="identification" value="{{ $user->identification }}" />
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-lg-12 col-form-label">Nombre</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="name" value="{{ $user->name }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-lg-12 col-form-label">Apellidos</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="last_name" value="{{ $user->last_name }}" />
                                </div>
                            </div>

                            {{-- Fecha de Nacimiento --}}
                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-4 col-lg-12 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled type="date" name="birthdate" value="{{ $user->birthdate }}" />
                                </div>
                            </div>

                            {{-- Provincia --}}
                            <div class="form-group row">
                                <label for="province" class="col-sm-4 col-lg-12 col-form-label">Provincia</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="province" value="{{ $user->province }}" />
                                </div>
                            </div>

                            {{-- Ciudad --}}
                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-lg-12 col-form-label">Ciudad</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="city" value="{{ $user->city }}" />
                                </div>
                            </div>

                            <hr>

                            {{-- Correo Electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-lg-12 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled type="email" name="email" value="{{ $user->email }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-lg-12 col-form-label">Teléfono</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="phone" type="number" value="{{ $user->phone }}" />
                                </div>
                            </div>

                            {{-- Dirección Exacta --}}
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-lg-12 col-form-label">Dirección</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-textarea disabled name="address">{{ $user->address }}</x-textarea>
                                </div>
                            </div>

                            <hr>

                            {{-- Género --}}
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-lg-12 col-form-label">Género</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="gender" value="{{ $user->gender }}" />
                                </div>
                            </div>

                            <hr>

                            {{-- Años de Experiencia --}}
                            <div class="form-group row">
                                <label for="experience" class="col-sm-4 col-lg-12 col-form-label">Años de Experiencia</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="experience" type="number" value="{{ $user->experience }}" />
                                </div>
                            </div>

                            {{-- Número de Contrato --}}
                            <div class="form-group row">
                                <label for="contract_number" class="col-sm-4 col-lg-12 col-form-label">Número de Contrato</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="contract_number" type="number" value="{{ $user->contract_number }}" />
                                </div>
                            </div>

                            {{-- Año de Contrato --}}
                            <div class="form-group row">
                                <label for="contract_year" class="col-sm-4 col-lg-12 col-form-label">Año de Contrato</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="contract_year" type="number" value="{{ $user->contract_year }}" />
                                </div>
                            </div>

                            <hr>

                            {{-- Role --}}
                            <div x-data="{ role: '{{ $user->role_id }}' }">

                                <div class="form-group row">
                                    <label for="role_id" class="col-sm-4 col-lg-12 col-form-label">Rol</label>
                                    <div class="col-sm-8 col-lg-12">
                                        <x-input disabled name="role_id" value="{{ $user->role->description }}" />
                                    </div>
                                </div>

                                {{-- Entrenadores --}}
                                <div x-show="role == 2">

                                    {{-- Deporte --}}
                                    <div class="form-group row">
                                        <label for="sport" class="col-sm-4 col-lg-12 col-form-label">Deporte</label>
                                        <div class="col-sm-8 col-lg-12">
                                            <x-input disabled name="sport_id" value="{{ $user->role_id == 2 ? $user->coach->sport->description : '' }}" />
                                        </div>
                                    </div>

                                    {{-- Teléfono Celular --}}
                                    <div class="form-group row">
                                        <label for="other_phone" class="col-sm-4 col-lg-12 col-form-label">Teléfono Celular</label>
                                        <div class="col-sm-8 col-lg-12">
                                            <x-input disabled name="other_phone" type="number" value="{{ $user->role_id == 2 && $user->coach->phone }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="physios-tab" data-toggle="tab" href="#physios" role="tab" aria-controls="physios" aria-selected="true">Fisioterapias</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="musculars-tab" data-toggle="tab" href="#musculars" role="tab" aria-controls="musculars" aria-selected="false">Musculaciones</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="trainings-tab" data-toggle="tab" href="#trainings" role="tab" aria-controls="trainings" aria-selected="false">Entrenamientos</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="physios" role="tabpanel" aria-labelledby="physios-tab">
                                    <div class="row">
                                        <div class="col my-3">
                                            <x-table>
                                                <x-slot name="head">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @foreach ($user->physios as $physio)
                                                    <tr>
                                                        <td>{{ $physio->id }}</td>
                                                        <td>{{ $physio->date->isoFormat('LL') }}</td>
                                                        <td>{{ $physio->athlete->user->identification }}</td>
                                                        <td>
                                                            <a target="_blank" href="{{ route('athletes.show', $physio->athlete->id) }}" class="link">
                                                                {{ $physio->athlete->user->full_name }} &nbsp;
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td width="100px" class="text-center">
                                                            <div class="dropdown">
                                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </button>

                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    @can('roles', 'Fisioterapia')
                                                                    <a class="dropdown-item" href="{{ route('physios.edit', $physio) }}">
                                                                        <i class="fas fa-edit"></i> &nbsp;
                                                                        Editar
                                                                    </a>
                                                                    @endcan
                                                                    <a class="dropdown-item" href="{{ route('physios.generate-pdf', $physio->id) }}">
                                                                        <i class="fas fa-download"></i> &nbsp;
                                                                        Descargar
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </x-slot>

                                                <x-slot name="foot">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>
                                            </x-table>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="musculars" role="tabpanel" aria-labelledby="musculars-tab">

                                    <div class="row">
                                        <div class="col my-3">
                                            <x-table>
                                                <x-slot name="head">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @foreach ($user->musculars as $muscular)
                                                    <tr>
                                                        <td>{{ $muscular->id }}</td>
                                                        <td>{{ $muscular->date->isoFormat('LL') }}</td>
                                                        <td>{{ $muscular->athlete->user->identification }}</td>
                                                        <td>
                                                            <a target="_blank" href="{{ route('athletes.show', $muscular->athlete->id) }}" class="link">
                                                                {{ $muscular->athlete->user->full_name }} &nbsp;
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td width="100px" class="text-center">
                                                            <div class="dropdown">
                                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </button>

                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    @can('roles', 'Musculacion')
                                                                    <a class="dropdown-item" href="{{ route('musculars.edit', $muscular->id) }}">
                                                                        <i class="fas fa-edit"></i> &nbsp;
                                                                        Editar
                                                                    </a>
                                                                    @endcan
                                                                    <a class="dropdown-item" href="{{ route('musculars.generate-pdf', $muscular->id) }}">
                                                                        <i class="fas fa-download"></i> &nbsp;
                                                                        Descargar
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </x-slot>
                                                <x-slot name="foot">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>
                                            </x-table>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="trainings" role="tabpanel" aria-labelledby="trainings-tab">
                                    <div class="row">
                                        <div class="col my-3">
                                            <x-table>
                                                <x-slot name="head">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @foreach ($user->trainings as $training)
                                                    <tr>
                                                        <td>{{ $training->id }}</td>
                                                        <td>{{ $training->date->isoFormat('LL') }}</td>
                                                        <td>{{ $training->athlete->user->identification }}</td>
                                                        <td>
                                                            <a target="_blank" href="{{ route('athletes.show', $training->athlete->id) }}" class="link">
                                                                {{ $training->athlete->user->full_name }} &nbsp;
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td width="100px" class="text-center">
                                                            <div class="dropdown">
                                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </button>

                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    <a class="dropdown-item" href="{{ route('trainings.edit', $training) }}">
                                                                        <i class="fas fa-edit"></i> &nbsp;
                                                                        Editar
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </x-slot>

                                                <x-slot name="foot">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Atleta</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>
                                            </x-table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
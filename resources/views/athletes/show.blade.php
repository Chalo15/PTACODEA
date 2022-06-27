<x-app-layout title="Información del Atleta">

    @if ($athlete->user->role_id == 3)
        <div class="row">
            <div class="col mb-3">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-reply"></i> &nbsp;
                            Atrás
                        </a>
                    </div>
    @endif

    @if ($athlete->user->role_id != 3)
        <div class="row">
            <div class="col mb-3">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('athletes.index') }}" class="btn btn-primary">
                            <i class="fas fa-reply"></i> &nbsp;
                            Atrás
                        </a>
                    </div>
    @endif

    @can('role', ['Admin'])
        <div class="col d-flex justify-content-end">
            <a href="{{ route('athletes.edit', $athlete->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> &nbsp;
                Editar
            </a>
        </div>
    @endcan
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
                                    <img src="{{ $athlete->user->photo ? asset($athlete->user->photo) : asset('images/default.png') }}"
                                        class="rounded mx-auto d-block" width="200" height="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($athlete->user->role_id == 2)
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-header">
                                Copia de Cédula de Identidad
                            </div>
                            <div class="card-body text-center">
                                <a target="_black"
                                    href="{{ route('users.get-identification-pdf', $athlete->user->id) }}"
                                    class="btn btn-primary">
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
                                <label for="identification" class="col-sm-4 col-lg-12 col-form-label">Cédula de
                                    Identidad o DIMEX</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="identification"
                                        value="{{ $athlete->user->identification }}" />
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-lg-12 col-form-label">Nombre</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="name" value="{{ $athlete->user->name }}" />
                                </div>
                            </div>

                            {{-- Apellidos --}}
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-lg-12 col-form-label">Apellidos</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="last_name" value="{{ $athlete->user->last_name }}" />
                                </div>
                            </div>

                            {{-- Fecha de Nacimiento --}}
                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-4 col-lg-12 col-form-label">Fecha de
                                    Nacimiento</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled type="date" name="birthdate"
                                        value="{{ $athlete->user->birthdate }}" />
                                </div>
                            </div>

                            {{-- Estado del Atleta --}}
                            <div class="form-group row">
                                <label for="state" class="col-sm-4 col-lg-12 col-form-label">Estado</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="state" value="{{ $athlete->state }}" />
                                </div>
                            </div>

                            {{-- Cantón --}}
                            <div class="form-group row">
                                <label for="canton" class="col-sm-4 col-lg-12 col-form-label">Cantón</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="canton" value="{{ $athlete->user->canton }}" />
                                </div>
                            </div>

                            {{-- Distrito --}}
                            <div class="form-group row">
                                <label for="district" class="col-sm-4 col-lg-12 col-form-label">Distrito</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="district" value="{{ $athlete->user->district }}" />
                                </div>
                            </div>

                            <hr>

                            {{-- Correo Electrónico --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-lg-12 col-form-label">Correo
                                    Electrónico</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled type="email" name="email"
                                        value="{{ $athlete->user->email }}" />
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-lg-12 col-form-label">Teléfono</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="phone" type="number"
                                        value="{{ $athlete->user->phone }}" />
                                </div>
                            </div>

                            {{-- Dirección Exacta --}}
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-lg-12 col-form-label">Dirección</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-textarea disabled name="address">{{ $athlete->user->address }}</x-textarea>
                                </div>
                            </div>

                            <hr>

                            {{-- Género --}}
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-lg-12 col-form-label">Género</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="gender" value="{{ $athlete->user->gender }}" />
                                </div>
                            </div>

                            <hr>

                            {{-- Disciplina Deportiva --}}
                            <div class="form-group row">
                                <label for="sport_id" class="col-sm-4 col-lg-12 col-form-label">Disciplina
                                    Deportiva</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="sport_id" value="{{ $athlete->sport->description }}" />
                                </div>
                            </div>

                            {{-- Número de Poliza --}}
                            <div class="form-group row">
                                <label for="policy" class="col-sm-4 col-lg-12 col-form-label">Número de
                                    Póliza</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="policy" value="{{ $athlete->policy }}" />
                                </div>
                            </div>

                            {{-- Número de Dictamen Medico --}}
                            <div class="form-group row">
                                <label for="medical_opinion" class="col-sm-4 col-lg-12 col-form-label">Número de
                                    Dictamen
                                    Médico</label>
                                <div class="col-sm-8 col-lg-12">
                                    <x-input disabled name="medical_opinion"
                                        value="{{ $athlete->medical_opinion }}" />
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
                                    <a class="nav-link active" id="physios-tab" data-toggle="tab" href="#physios"
                                        role="tab" aria-controls="physios" aria-selected="true">Fisioterapias</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="musculars-tab" data-toggle="tab" href="#musculars"
                                        role="tab" aria-controls="musculars"
                                        aria-selected="false">Musculaciones</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="trainings-tab" data-toggle="tab" href="#trainings"
                                        role="tab" aria-controls="trainings"
                                        aria-selected="false">Entrenamientos</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="physios" role="tabpanel"
                                    aria-labelledby="physios-tab">
                                    <div class="row">
                                        <div class="col my-3">
                                            <x-table>
                                                <x-slot name="head">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Instructor</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @foreach ($athlete->physios as $physio)
                                                        <tr>
                                                            <td>{{ $physio->id }}</td>
                                                            <td>{{ $physio->date->isoFormat('LL') }}</td>
                                                            <td>{{ $physio->user->identification }}</td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="{{ route('users.show', $physio->user->id) }}"
                                                                    class="link">
                                                                    {{ $physio->user->full_name }} &nbsp;
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            </td>
                                                            <td width="100px" class="text-center">
                                                                <div class="dropdown">
                                                                    <button class="btn" type="button"
                                                                        id="dropdownMenu2" data-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>

                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenu2">
                                                                        @can('roles', 'Fisioterapia')
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('physios.edit', $physio) }}">
                                                                                <i class="fas fa-edit"></i> &nbsp;
                                                                                Editar
                                                                            </a>
                                                                        @endcan
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('physios.generate-pdf', $physio->id) }}">
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
                                                        <th>Cédula del Instructor</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>
                                            </x-table>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="musculars" role="tabpanel"
                                    aria-labelledby="musculars-tab">

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
                                                    @foreach ($athlete->musculars as $muscular)
                                                        <tr>
                                                            <td>{{ $muscular->id }}</td>
                                                            <td>{{ $muscular->date->isoFormat('LL') }}</td>
                                                            <td>{{ $muscular->user->identification }}</td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="{{ route('users.show', $muscular->user->id) }}"
                                                                    class="link">
                                                                    {{ $muscular->user->full_name }} &nbsp;
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            </td>
                                                            <td width="100px" class="text-center">
                                                                <div class="dropdown">
                                                                    <button class="btn" type="button"
                                                                        id="dropdownMenu2" data-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>

                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenu2">
                                                                        @can('role', ['Musculacion'])
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('musculars.edit', $muscular) }}">
                                                                                <i class="fas fa-edit"></i> &nbsp;
                                                                                Editar
                                                                            </a>
                                                                        @endcan
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('musculars.generate-pdf', $muscular->id) }}"
                                                                            target="_blank">
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

                                <div class="tab-pane fade" id="trainings" role="tabpanel"
                                    aria-labelledby="trainings-tab">
                                    <div class="row">
                                        <div class="col my-3">
                                            <x-table>
                                                <x-slot name="head">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Cédula del Instructor</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @foreach ($athlete->trainings as $training)
                                                        <tr>
                                                            <td>{{ $training->id }}</td>
                                                            <td>{{ $training->date->isoFormat('LL') }}</td>
                                                            <td>{{ $training->user->identification }}</td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="{{ route('users.show', $training->user->id) }}"
                                                                    class="link">
                                                                    {{ $training->user->full_name }} &nbsp;
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            </td>
                                                            <td width="100px" class="text-center">

                                                                <div class="dropdown">
                                                                    <button class="btn" type="button"
                                                                        id="dropdownMenu2" data-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>

                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenu2">
                                                                        @can('role', ['Instructor'])
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('trainings.edit', $training) }}">
                                                                                <i class="fas fa-edit"></i> &nbsp;
                                                                                Editar
                                                                            </a>
                                                                        @endcan
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('trainings.generate-pdf', $training->id) }}"
                                                                            target="_blank">
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
                                                        <th>Cédula del Instructor</th>
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

{{-- @extends('layouts.app')

@section('content')
<body class="seedata text-light">

    <div class="container-fluid">
        @foreach ($athlete->user as $us)
        @foreach ($atleta as $athlete)
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
                <h2 class="display-5 text-center"><u>Información de Contacto</u></h2>
            </div>
        </div>

        <form class="form-horizontal row justify-content-center h5">
            <div class="form-group ">
                <label class="col-lg-5 control-label font-weight-bold">Nombre:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $us->name }}</p>
</div>
<label class="col-lg-5 control-label font-weight-bold">Apellidos:</label>
<div class="col-lg-10">
    <p class="form-control-static">{{ $us->lastname}}</p>
</div>
</div>
<div class="form-group ">
    <label class="col-lg-5 control-label font-weight-bold">Cédula:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->identification }}</p>
    </div>
    <label class="col-lg-5 control-label font-weight-bold">Identificación de Rol:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->role_id }}</p>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-5 control-label font-weight-bold">Teléfono:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->phone}}</p>
    </div>
    <label class="col-lg-5 control-label font-weight-bold">Fecha de nacimiento:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->birthdate}}</p>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-5 control-label font-weight-bold">Email:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->email}}</p>
    </div>
    <label class="col-lg-5 control-label font-weight-bold">Cantón:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->canton}}</p>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-5 control-label font-weight-bold">Distrito:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->district}}</p>
    </div>
    <label class="col-lg-5 control-label font-weight-bold">Dirección:</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{ $us->address}}</p>
    </div>
</div>
</div>

</form>


<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
        <h2 class="display-5 text-center"><u>Información de Expediente</u></h2>
    </div>
</div>
<form class="form-horizontal row justify-content-center h5">
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Género:</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $us->gender }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Tipo de Sangre:</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->blood}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Identificación de Disciplina:</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->sport_id}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Orientación de Juego:</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->laterality }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Cédula de Encargado(a):</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->identification_manager }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Nombre de Encargado(a):</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->name_manager }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Apellidos de Encargado(a):</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->lastname_manager }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-5 control-label font-weight-bold">Contacto de Encargado(a):</label>
        <div class="col-lg-10">
            <p class="form-control-static">{{ $athlete->contact_manager }}</p>
        </div>
    </div>
</form>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-6 p-1 m-3">
            <h2 class="display-5 text-center"><u>Información de Expediente Detallada</u></h2>

        </div>
        <div class="col-md-8 col-form-label text-md-center p-1 m-4">
            <h3><b>Nota:</b> Acá podés visualizar los apuntes que registraste en los últimos dos meses, por conceptos de musculación, fisioterapia y tu perfil.</h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <x-row>
                <label class="col-md-5 col-form-label text-md-right">Escoja una opcion: </label>
                <div class="col-md-3 selectContainer justify-content-center text-center aligne-item-center">
                    <select name="asunto" placeholder="Visualizar" class="form-control" type="text" value="{{ old('asunto') }}">
                        <option value="0">Elegir</option>
                        <option value="mus">Musculación</option>
                        <option value="fis">Fisioterapia</option>
                        <option value="per">Mi perfil</option>
                    </select>
                </div>
            </x-row>

            <x-row>
                <label class="col-md-5 col-form-label text-md-right">Escoja una fecha: </label>
                <div class="col-md-3 selectContainer justify-content-center text-center aligne-item-center">
                    <select name="asunto" placeholder="Visualizar" class="form-control" type="text" value="{{ old('asunto') }}">
                        <option value="0">Elegir</option>
                    </select>
                </div>
            </x-row>

            <x-row>
                <div class="offset-md-6 col-md-6 p-3">
                    <button class="btn btn-negro">Consultar</button>
                </div>
            </x-row>
        </div>

    </div>
    @endforeach
    @endforeach
</div>

</body>
@endsection --}}

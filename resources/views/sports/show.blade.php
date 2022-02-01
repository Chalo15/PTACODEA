<x-app-layout title="Información del Deporte">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('sports.index') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <div class="card">
                <div class="card-header">
                    Información del Deporte
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <x-input name="name" disabled value="{{ $sport->description }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="template" class="col-sm-4 col-form-label">Plantilla</label>
                        <div class="col-sm-8">
                            <x-editor name="template" value="{!! $sport->ckeditor !!}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="athletes-tab" data-toggle="tab" href="#athletes" role="tab" aria-controls="athletes" aria-selected="true">Athletas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="instructors-tab" data-toggle="tab" href="#instructors" role="tab" aria-controls="instructors" aria-selected="false">Instructores</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="athletes" role="tabpanel" aria-labelledby="athletes-tab">
                            <div class="row">
                                <div class="col my-3">
                                    <x-table>
                                        <x-slot name="head">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Identificación</th>
                                                <th>Nombre Completo</th>
                                                <th>Telefono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </x-slot>

                                        <x-slot name="body">
                                            @foreach ($sport->athletes as $athlete)
                                            <tr>
                                                <td class="text-center">
                                                    <img class="rounded" src="{{ $athlete->user->photo ? asset($athlete->user->photo) : asset('images/default.png') }}" width="30" height="30">
                                                </td>
                                                <td>{{ $athlete->user->identification }}</td>
                                                <td>
                                                    <a target="_blank" href="{{ route('athletes.show', $athlete->id) }}" class="link">
                                                        {{ $athlete->user->full_name }} &nbsp;
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $athlete->user->phone }}</td>
                                                <td width="100px" class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a class="dropdown-item" href="{{ route('athletes.show', $athlete->id) }}">
                                                                <i class="fas fa-info-circle"></i> &nbsp;
                                                                Información
                                                            </a>

                                                            <a class="dropdown-item" href="{{ route('athletes.edit', $athlete->id) }}">
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
                                                <th>Foto</th>
                                                <th>Identificación</th>
                                                <th>Nombre Completo</th>
                                                <th>Telefono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </x-slot>
                                    </x-table>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">

                            <div class="row">
                                <div class="col my-3">
                                    <x-table>
                                        <x-slot name="head">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Identificación</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo electrónico</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </x-slot>

                                        <x-slot name="body">
                                            @foreach ($sport->coaches as $coach)
                                            <tr>
                                                <td class="text-center">
                                                    <img class="rounded" src="{{ $coach->user->photo ? asset($coach->user->photo) : asset('images/default.png') }}" width="30" height="30">
                                                </td>
                                                <td>{{ $coach->user->identification }}</td>
                                                <td>
                                                    <a target="_blank" href="{{ route('users.show', $coach->user->id) }}" class="link">
                                                        {{ $coach->user->full_name }} &nbsp;
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $coach->user->email }}</td>
                                                <td width="50px" class="text-center">

                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a class="dropdown-item" href="{{ route('users.show', $coach->user->id) }}">
                                                                <i class="fas fa-info-circle"></i> &nbsp;
                                                                Información
                                                            </a>

                                                            <a class="dropdown-item" href="{{ route('users.edit', $coach->user->id) }}">
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
                                                <th>Foto</th>
                                                <th>Identificación</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo electrónico</th>
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


</x-app-layout>

<x-app-layout title="Citas Generadas">

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
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            Citas Generadas
                        </div>

                        <div class="col d-flex justify-content-end">
                            @can('role', ['Musculacion', 'Admin', 'Fisioterapia'])
                                <a href="{{ route('events.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> &nbsp;
                                    Nuevo
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha de la cita</th>
                                        <th>Hora de Inicio</th>
                                        <th>Hora de Finalizacion</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre Completo</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Especialista</th>
                                        <th>Nombre Completo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->date->isoFormat('LL') }}</td>
                                            <td>{{ $event->start }}</td>
                                            <td>{{ $event->end }}</td>
                                            <td>{{ $event->athlete->user->identification }}</td>
                                            <td>
                                                <a target="_blank" class="link"
                                                    href="{{ route('athletes.show', $event->athlete->id) }}">
                                                    {{ $event->athlete->user->full_name }}
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </td>
                                            <td>{{ $event->athlete->sport->description }}</td>
                                            <td>{{ $event->user->identification }}</td>
                                            <td>
                                                <a target="_blank" class="link"
                                                    href="{{ route('users.show', $event->user->id) }}">
                                                    {{ $event->user->full_name }}
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </td>
                                            <td width="100px" class="text-center">

                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenu2"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        @can('role', ['Musculacion', 'Fisioterapia'])
                                                            <a class="dropdown-item"
                                                                href="{{ route('events.edit', $event) }}">
                                                                <i class="fas fa-edit"></i> &nbsp;
                                                                Editar
                                                            </a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-slot>

                                <x-slot name="foot">
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha de la cita</th>
                                        <th>Hora de Inicio</th>
                                        <th>Hora de Finalizacion</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre Completo</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Especialista</th>
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

</x-app-layout>

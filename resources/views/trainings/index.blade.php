<x-app-layout title="Entrenamientos">

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
                    <h2 class="text-center d-block font-weight-bold ">
                        Entrenamientos
                    </h2>
                    <div class="row">

                        <div class="col d-flex justify-content-end">
                            @can('role', ['Instructor'])
                            <a href="{{ route('trainings.create') }}" class="btn btn-primary mx-1">
                                <i class="fas fa-plus"></i> &nbsp;
                                Nuevo
                            </a>
                            @endcan

                            {{-- @can('role', ['Admin'])
                                <a href="{{ route('trainings.generate-ReportPdf') }}" class="btn btn-primary mx-3">
                            <i class="fas fa-plus"></i> &nbsp;
                            Reporte de asistencia y lesiones
                            </a>
                            @endcan --}}
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
                                        <th>Fecha</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre Completo</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Instructor</th>
                                        <th>Nombre Completo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($trainings as $training)
                                    <tr>
                                        <td>{{ $training->id }}</td>
                                        <td>{{ $training->date->isoFormat('LL') }}</td>
                                        <td>{{ $training->athlete->user->identification }}</td>
                                        <td>
                                            <a target="_blank" class="link" href="{{ route('athletes.show', $training->athlete->id) }}">
                                                {{ $training->athlete->user->full_name }}
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td>{{ $training->athlete->sport->description }}</td>
                                        <td>{{ $training->user->identification }}</td>
                                        <td>
                                            <a target="_blank" class="link" href="{{ route('users.show', $training->user->id) }}">
                                                {{ $training->user->full_name }}
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td width="100px" class="text-center">

                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    @can('role', ['Instructor'])
                                                    <a class="dropdown-item" href="{{ route('trainings.edit', $training) }}">
                                                        <i class="fas fa-edit"></i> &nbsp;
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('trainings.generate-ReportPdf', $training->user->id) }}" class="dropdown-item">
                                                        <i class="fas fa-plus"></i> &nbsp;
                                                        Mi reporte de asistencia y lesiones
                                                    </a>
                                                    @endcan
                                                    <a class="dropdown-item" href="{{ route('trainings.generate-pdf', $training->id) }}" target="_blank">
                                                        <i class="fas fa-download"></i> &nbsp;
                                                        Descargar
                                                    </a>

                                                    @can('role', ['Admin'])
                                                    <a href="{{ route('trainings.generate-ReportPdf', $training->id) }}" class="dropdown-item">
                                                        <i class="fas fa-plus"></i> &nbsp;
                                                        Reporte de asistencia y lesiones
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
                                        <th>Fecha</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre Completo</th>
                                        <th>Disciplina</th>
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

</x-app-layout>
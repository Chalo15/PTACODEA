<x-app-layout title="Documentos de Musculacion">

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
                            Documentos
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="{{ route('musculars.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> &nbsp;
                                Nuevo
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th>Documento</th>
                                        <th>Fecha</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre Completo</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Especialista</th>
                                        <th>Nombre Completo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($musculars as $muscular)
                                        <tr>
                                            <td>{{ $muscular->id }}</td>
                                            <td>{{ $muscular->date }}</td>
                                            <td>{{ $muscular->athlete->user->identification }}</td>
                                            <td>{{ $muscular->athlete->user->name . ' ' . $muscular->athlete->user->last_name }}
                                            </td>
                                            <td>{{ $muscular->athlete->sport->description }}</td>
                                            <td>{{ $muscular->user->identification }}</td>
                                            <td>{{ $muscular->user->name . ' ' . $muscular->user->last_name }}</td>

                                            <td width="100px" class="text-center">

                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenu2"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        @can('roles', 'Musculacion')
                                                            <a class="dropdown-item"
                                                                href="{{ route('musculars.edit', $muscular->id) }}">
                                                                <i class="fas fa-edit"></i> &nbsp;
                                                                Editar
                                                            </a>
                                                        @endcan
                                                        <a class="dropdown-item"
                                                            href="{{ route('musculars.generate-pdf', $muscular->id) }}">
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
                                        <th>Documento</th>
                                        <th>Fecha</th>
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

                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            {{ $musculars->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout title="Fisioterapias">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> &nbsp;
                Atrás
            </a>
        </div>
        <div class="col mb-3 text-right">
            @can('role',['Fisioterapia'])
            @php
            $user = Auth::user();
            @endphp
            <a href="{{ route('physios.generateReport-pdf', $user) }}" class="btn btn-primary">
                <i class="fas fa-file-pdf"></i> &nbsp;
                Reporte
            </a>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            Fisioterapias
                        </div>

                        <div class="col d-flex justify-content-end">
                            @can('role', ['Fisioterapia'])
                            <a href="{{ route('physios.create') }}" class="btn btn-primary">
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
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre del Atleta</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Fisioterapeuta</th>
                                        <th>Nombre Completo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($physios as $physio)
                                    <tr>
                                        <td>{{ $physio->id }}</td>
                                        <td>{{ $physio->date->isoFormat('LL') }}</td>
                                        <td>{{ $physio->time }}</td>
                                        <td>{{ $physio->athlete->user->identification }}</td>
                                        <td>
                                            <a target="_blank" class="link" href="{{ route('athletes.show', $physio->athlete->id) }}">
                                                {{ $physio->athlete->user->full_name }}
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td>{{ $physio->athlete->sport->description }}</td>
                                        <td>{{ $physio->user->identification }}</td>
                                        <td>
                                            <a target="_blank" class="link" href="{{ route('users.show', $physio->user->id) }}">
                                                {{ $physio->user->full_name }}
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td width="100px" class="text-center">

                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    @can('role', ['Fisioterapia'])
                                                    <a class="dropdown-item" href="{{ route('physios.edit', $physio) }}">
                                                        <i class="fas fa-edit"></i> &nbsp;
                                                        Editar
                                                    </a>
                                                    @endcan
                                                    <a class="dropdown-item" href="{{ route('physios.generate-pdf', $physio->id) }}" target="_blank">
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
                                        <th>Hora</th>
                                        <th>Cédula del Atleta</th>
                                        <th>Nombre del Atleta</th>
                                        <th>Disciplina</th>
                                        <th>Cédula del Fisioterapeuta</th>
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

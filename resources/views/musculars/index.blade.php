<x-app-layout title="Documentos de Musculacion">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> &nbsp;
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
                                    @foreach ($muscular as $musculars)
                                    <tr>
                                        <td>{{ $musculars->id }}</td>
                                        <td>{{ $musculars->date }}</td>
                                        <td>{{ $musculars->athelete->user->identification }}</td>
                                        <td>{{ $musculars->athlete->user->name . " " . $musculars->athlete->user->lastname}}</td>
                                        <td>{{ $musculars->athelete->sport->description }}</td>
                                        <td>{{ $musculars->user->identification }}</td>
                                        <td>{{ $musculars->user->name . " " . $musculars->user->lastname}}</td>
                                        <th>Acciones</th>

                                        <td width="100px" class="text-center">

                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <a class="dropdown-item" href="{{ route('users.edit', $muscular->id) }}">
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
                            {{ $muscular->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

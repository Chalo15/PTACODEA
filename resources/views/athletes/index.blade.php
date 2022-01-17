<x-app-layout title="Atletas">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-success">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Atletas
                    <a href="{{ route('athletes.create') }}" class="btn btn-success">
                        Nuevo
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificación</th>
                                        <th>Nombre Completo</th>
                                        <th>Telefono</th>
                                        <th>Disciplina</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($athletes as $athlete)
                                    <tr>
                                        <td>{{ $athlete->id }}</td>
                                        <td>{{ $athlete->user->identification }}</td>
                                        <td>{{ $athlete->user->name . " " . $athlete->user->lastname }}</td>
                                        <td>{{ $athlete->user->phone }}</td>
                                        <td>{{ $athlete->sport->description }}</td>
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
                                        <th>ID</th>
                                        <th>Identificación</th>
                                        <th>Nombre Completo</th>
                                        <th>Telefono</th>
                                        <th>Disciplina</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>
                            </x-table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    {{ $athletes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

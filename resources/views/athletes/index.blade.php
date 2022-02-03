<x-app-layout title="Atletas">

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
                            Atletas
                        </div>
                        <div class="col d-flex justify-content-end">
                            @can('role', ['Admin'])
                                <a href="{{ route('athletes.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> &nbsp;
                                    Nuevo
                                </a>
                            @endcan
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th>Foto</th>
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
                                    <td class="text-center">
                                        <img class="rounded"
                                            src="{{ $athlete->user->photo ? asset($athlete->user->photo) : asset('images/default.png') }}"
                                            width="30" height="30">
                                    </td>
                                    <td>{{ $athlete->user->identification }}</td>
                                    <td>{{ $athlete->user->name . ' ' . $athlete->user->lastname }}</td>
                                    <td>{{ $athlete->user->phone }}</td>
                                    <td>{{ $athlete->sport->description }}</td>
                                    <td width="100px" class="text-center">

                                        <div class="dropdown">
                                            <<<<<<< HEAD=======>>>>>>> origin/Pablo
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenu2"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <a class="dropdown-item"
                                                            href="{{ route('athletes.show', $athlete->id) }}">
                                                            <i class="fas fa-info-circle"></i> &nbsp;
                                                            Información
                                                        </a>
                                                        <<<<<<< HEAD @can('role', ['Admin'])=======@can('role', 'Admin'
                                                            )>>>>>>> origin/Pablo
                                                            <a class="dropdown-item"
                                                                href="{{ route('athletes.edit', $athlete->id) }}">
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
                            <th>Foto</th>
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
    </div>
</div>

</x-app-layout>

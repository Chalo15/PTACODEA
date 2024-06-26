<x-app-layout title="Deportes">

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
                        Deportes
                    </h2>
                </div>

                <div class="card-body">
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </x-slot>

                        <x-slot name="body">
                            @foreach ($sports as $sport)
                            <tr>
                                <td>{{ $sport->id }}</td>
                                <td>{{ $sport->description }}</td>
                                <td width="100px" class="text-center">

                                    <div class="dropdown">
                                        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a class="dropdown-item" href="{{ route('sports.show', $sport->id) }}">
                                                <i class="fas fa-info-circle"></i> &nbsp;
                                                Información
                                            </a>

                                            <a class="dropdown-item" href="{{ route('sports.edit', $sport->id) }}">
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
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </x-slot>
                    </x-table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
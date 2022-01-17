<x-app-layout title="Usuarios">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-success">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <x-card title="Usuarios" color="primary">

                <x-slot name="header" class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        Nuevo
                    </a>
                </x-slot>

                <x-slot name="body">
                    <div class="row">
                        <div class="col">
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre Completo</th>
                                        <th>Correo electrónico</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->identification }}</td>
                                        <td>{{ $user->name . " " .  $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->description }}</td>
                                        <td width="100px" class="text-center">

                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
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
                                        <th>Cédula</th>
                                        <th>Nombre Completo</th>
                                        <th>Correo electrónico</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </x-slot>
                            </x-table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>

                </x-slot>

            </x-card>

        </div>
    </div>

</x-app-layout>

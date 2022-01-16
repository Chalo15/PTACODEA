<x-app-layout title="Solicitudes">

    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('home') }}" class="btn btn-success">Atrás</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Solicitudes
                </div>

                <div class="card-body">
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre Completo</th>
                                <th>Teléfono</th>
                                <th>Diciplina</th>
                                <th>Acciones</th>
                            </tr>
                        </x-slot>

                        <x-slot name="body">
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->identification }}</td>
                                <td>{{ $user->name . " " .  $user->lastname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td></td>
                                {{-- <td>{{ $user->athlete->sport->description }}</td> --}}
                                <td width="100px" class="text-center">

                                    <div class="dropdown">
                                        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <form action="{{ route('requests.accept', $user->id) }}" method="POST">
                                                @method('PUT')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="fas fa-user-check"></i> &nbsp;
                                                    Aceptar
                                                </button>
                                            </form>

                                            <form action="{{ route('requests.deny', $user->id) }}" method="POST">
                                                @method('PUT')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="fas fa-user-times"></i> &nbsp;
                                                    Denegar
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </x-slot>

                        <x-slot name="foot">
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre Completo</th>
                                <th>Teléfono</th>
                                <th>Diciplina</th>
                                <th>Acciones</th>
                            </tr>
                        </x-slot>
                    </x-table>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="athlete_request">


        <div class="container-fluid">
            <h1 class="text-center">Solicitudes de Registro de Atletas</h1>
            <hr>
            <div class="table-responsive card-body">
                <table border="2" class="table align-middle">
                    <tr>
                        <td scope="col">Identificación</td>
                        <td scope="col">Nombre</td>
                        <td scope="col">Apellidos</td>
                        <td scope="col">Telefono</td>
                        <td scope="col">Id Disciplina</td>
                        <td scope="col">Acción</td>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        </tr>
                        <td scope="col">{{ $user->identification }}</td>
    <td scope="col">{{ $user->name }}</td>
    <td scope="col">{{ $user->lastname }}</td>
    <td scope="col">{{ $user->phone }}</td>
    <td scope="col">{{ $user->sport_id }}</td>
    <td>
        <div class="justify-content-center text-center">
            <form class="d-inline" action="{{ route('athlete_accepted', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="d-inline btn btn-negro" type="submit">Aceptar</button>
            </form>
            <form class="d-inline " action="{{ route('athlete_delete', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="d-inline btn btn-negro" type="submit">Denegar</button>
            </form>
        </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>

    </div> --}}
</x-app-layout>

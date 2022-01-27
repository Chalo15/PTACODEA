<x-app-layout title="Documentos de Fisioterapia">

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
                            <a href="{{ route('physios.create') }}" class="btn btn-primary">
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
                                        <td>{{ $physio->athlete->user->identification }}</td>
                                        <td>{{ $physio->athlete->user->name . " " . $physio->athlete->user->last_name}}</td>
                                        <td>{{ $physio->athlete->sport->description }}</td>
                                        <td>{{ $physio->user->identification }}</td>
                                        <td>{{ $physio->user->name . " " . $physio->user->last_name}}</td>


                                            <td width="100px" class="text-center">

                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenu2"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <a class="dropdown-item" href="{{ route('physios.edit', $physio) }}">
                                                        <i class="fas fa-edit"></i> &nbsp;
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('physios.generate-pdf', $physio->id) }}">
                                                        <i class="fas fa-download"></i> &nbsp;
                                                        Descargar
                                                    </a>
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

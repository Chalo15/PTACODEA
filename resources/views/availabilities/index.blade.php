<x-app-layout title="Disponibilidades">

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
                            Disponibilidades
                        </div>

                        <div class="col d-flex justify-content-end">
                            @can('role', ['Musculacion'])
                                <a href="{{ route('availabilities.create') }}" class="btn btn-primary">
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
                                        <th>Encargado</th>
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        
                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($availabilities as $availability)
                                        <tr>
                                            <td>{{ $availability->id }}</td>
                                            <td>{{ $availability->user->full_name }}</td>
                                            <td>{{ $availability->date->isoFormat('LL') }}</td>
                                            <td>{{ $availability->start->format('g:i A') }}</td>
                                            <td>{{ $availability->end->format('g:i A') }}</td>

                                        </tr>
                                    @endforeach
                                </x-slot>
                                <x-slot name="foot">
                                    <tr>
                                        <th>ID</th>
                                        <th>Encargado</th>
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
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
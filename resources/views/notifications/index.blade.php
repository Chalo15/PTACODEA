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
                        @can('role',['Musculacion'])
                        <div class="justify-content-center col d-flex align-items-center text-center">
                            <h3 class="text-right">Notificaciones de musculación</h3>
                        </div>
                        @endcan
                        @can('role',['Fisioterapia'])
                        <div class="justify-content-center col d-flex align-items-center text-center">
                            <h3 class="text-right">Notificaciones de Fisioterapia</h3>
                        </div>
                        @endcan
                        @can('role',['Atleta'])
                        <div class=" col d-flex align-items-left text-left">
                            <h3 class="text-right">Notificaciones</h3>
                        </div>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <x-table>
                                <x-slot name="head">
                                    <tr>
                                        <th>Tipo</th>
                                        @can('role', ['Admin', 'Atleta'])
                                        <th>Id </th>
                                        @endcan
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Estado</th>
                                        @can('role',['Musculacion', 'Atleta'])
                                        <th>Acciones</th>
                                        @endcan

                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    <tr class="text-center">
                                        <td>70222/td>
                                            @can('role', ['Admin', 'Atleta'])
                                        <td>Billy</td>
                                        @endcan
                                        <td>5</td>
                                        <td>5</td>
                                        <td></td>
                                        <td>
                                            <span class="">Hola</span>
                                        </td>
                                        @can('role', ['Atleta', 'Musculacion'])
                                        <td width="50px" class="text-center">
                                            <button class="dropdown-item" type="submit">
                                                <i class="fas fa-check-circle"></i> &nbsp;
                                                Leer
                                            </button>

                                        </td>
                                        @endcan

                                    </tr>
                                </x-slot>
                                <x-slot name="foot">
                                    <tr>
                                        <th>ID</th>
                                        @can('role', ['Admin', 'Atleta'])
                                        <th>Encargado</th>
                                        @endcan
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Estado</th>
                                        @can('role',['Musculacion', 'Atleta'])
                                        <th>Acciones</th>
                                        @endcan
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
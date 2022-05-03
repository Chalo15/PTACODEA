<x-app-layout title="Citas">

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
                            Citas
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
                                        @can('role', ['Admin', 'Musculacion'])
                                        <th>Atleta</th>
                                        @endcan
                                        <th>Encargado</th>
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Estado</th>
                                        @can('role', ['Musculacion'])
                                        <th>Acciones</th>
                                        @endcan

                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($appointments as $appointment)
                                    <tr class="text-center">
                                        <td>{{ $appointment->id }}</td>
                                        @can('role', ['Admin', 'Musculacion'])
                                        <td>{{ $appointment->athlete->user->full_name }}</td>
                                        @endcan
                                        <td>{{ $appointment->availability->user->full_name }}</td>
                                        <td>{{ $appointment->availability->date->isoFormat('LL') }}</td>
                                        <td>{{ $appointment->availability->start->format('h:i A') }}</td>
                                        <td>{{ $appointment->availability->end->format('h:i A')}}</td>

                                        <?php
                                            if ($appointment->availability->state=="SOLICITADA"){$label_class='badge badge-pill badge-warning m-1';}
                                            else if ($appointment->availability->state=="CANCELADA"){$label_class='badge badge-pill badge-danger m-1';}
                                            else{$label_class='badge badge-pill badge-success m-1';}
                                        ?>

                                        <td>
                                            <span class="{{ $label_class }}">{{ $appointment->availability->state }}</span>
                                        </td>

                                        @can('role', ['Musculacion'])
                                        <td width="50px" class="text-center">

                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <?php
                                                        if($appointment->availability->state=='CANCELADA'){$hidden='disabled';}
                                                        else if($appointment->availability->state=='CONFIRMADA'){$hidden='disabled';}
                                                        else{$hidden='';}
                                                    ?>
                                                    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf

                                                        <input type="hidden" name="action" value="A">

                                                        <button class="dropdown-item" type="submit" name="btnAgree" {{ $hidden }}>
                                                            <i class="fas fa-check-circle"></i> &nbsp;
                                                            Aceptar
                                                        </button>

                                                    </form>

                                                    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf

                                                        <input type="hidden" name="action" value="D">

                                                        <button class="dropdown-item" type="submit">
                                                            <i class="fas fa-ban"></i> &nbsp;
                                                            Denegar
                                                        </button>

                                                    </form>

                                                </div>
                                            </div>

                                        </td>
                                        @endcan

                                    </tr>
                                    @endforeach

                                </x-slot>
                                <x-slot name="foot">
                                    <tr>
                                        <th>ID</th>
                                        @can('role', ['Admin', 'Musculacion'])
                                        <th>Atleta</th>
                                        @endcan
                                        <th>Encargado</th>
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Estado</th>
                                        @can('role', ['Musculacion'])
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

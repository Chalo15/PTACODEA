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
                        <h3 class="font-weight-bold ">
                            Disponibilidades
                        </h3>
                        <div class="col d-flex justify-content-end">
                            @can('role', ['Musculacion','Fisioterapia'])
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
                                        @can('role', ['Admin', 'Instructor'])
                                            <th>Encargado</th>
                                        @endcan
                                        @can('role', ['Instructor','Admin'])
                                            <th>Sala</th>
                                        @endcan
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Numero Cita</th>
                                        <th>Estado</th>
                                        @can('role', ['Musculacion', 'Instructor', 'Fisioterapia'])
                                            <th>Acciones</th>
                                        @endcan

                                    </tr>
                                </x-slot>

                                <x-slot name="body">
                                    @foreach ($availabilities as $availability)
                                        <tr class="text-center">
                                            <td>{{ $availability->id }}</td>
                                            @can('role', ['Admin', 'Instructor'])
                                                <td>{{ $availability->user->full_name }}</td>
                                            @endcan
                                            @can('role', ['Instructor','Admin'])
                                                <td>{{ $availability->user->role->description }}</td>
                                            @endcan
                                            <td>{{ $availability->date->isoFormat('LL') }}</td>
                                            <td>{{ $availability->start->format('g:i A') }}</td>
                                            <td>{{ $availability->end->format('g:i A') }}</td>
                                            <td>{{ $availability->counter }}</td>

                                            <?php
                                            if ($availability->state == 'PENDIENTE') {
                                                $text_state = 'PENDIENTE';
                                                $label_class = 'badge badge-pill badge-info m-1';
                                            } elseif ($availability->state == 'DISPONIBLE') {
                                                $text_state = 'DISPONIBLE';
                                                $label_class = 'badge badge-pill badge-success m-1';
                                            } elseif ($availability->state == 'SOLICITADA') {
                                                $text_state = 'SOLICITADA';
                                                $label_class = 'badge badge-pill badge-warning m-1';
                                            } elseif ($availability->state == 'CANCELADA') {
                                                $text_state = 'CANCELADA';
                                                $label_class = 'badge badge-pill badge-danger m-1';
                                            } else {
                                                $text_state = 'CONFIRMADA';
                                                $label_class = 'badge badge-pill badge-primary m-1';
                                            }
                                            ?>

                                            <td>
                                                <span class="{{ $label_class }}">{{ $text_state }}</span>
                                            </td>

                                            @can('role', ['Instructor', 'Musculacion','Fisioterapia'])
                                                <td width="50px" class="text-center">

                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenu2"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <?php
                                                            if ($availability->state == 'DISPONIBLE') {
                                                                $hidden = 'disabled';
                                                            }
                                                            //else if ($availability->date->format('d') < now()->format('d')){$hidden='disabled';}
                                                            else {
                                                                $hidden = '';
                                                            }
                                                            ?>
                                                            @can('role', ['Musculacion','Fisioterapia'])
                                                                <form
                                                                    action="{{ route('availabilities.update', $availability) }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf

                                                                    <button class="dropdown-item" type="submit"
                                                                        {{ $hidden }}>
                                                                        <i class="fas fa-check-circle"></i> &nbsp;
                                                                        Aprobar
                                                                    </button>

                                                                </form>

                                                                <form
                                                                    action="{{ route('availabilities.destroy', $availability) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf

                                                                    <button class="dropdown-item" type="submit">
                                                                        <i class="fas fa-trash"></i> &nbsp;
                                                                        Eliminar
                                                                    </button>

                                                                </form>
                                                            @endcan

                                                            @can('role', ['Instructor'])
                                                                <form action="{{ route('appointments.store') }}"
                                                                    method="POST">
                                                                    @csrf

                                                                    <x-input name="availability_id" type="hidden"
                                                                        value="{{ $availability->id }}" />

                                                                    <button class="dropdown-item" type="submit">
                                                                        <i class="fas fa-calendar-check"></i> &nbsp;
                                                                        Reservar
                                                                    </button>

                                                                </form>
                                                            @endcan

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
                                        @can('role', ['Admin', 'Instructor'])
                                            <th>Encargado</th>
                                        @endcan
                                        @can('role', ['Instructor', 'Admin'])
                                            <th>Sala</th>
                                        @endcan
                                        <th>Fecha</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Numero Cita</th>
                                        <th>Estado</th>
                                        @can('role', ['Musculacion', 'Instructor', 'Fisioterapia'])
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

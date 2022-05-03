<x-app-layout title="Inicio">
    {{-- --------------------PRIMER BLOQUE------------------ --}}
    <div class="row">
        @can('role', ['Admin'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Usuarios
                </div>
                <div class="card-body">
                    <i class="fas fa-users fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-block">
                        Acceder &nbsp;
                        <i class="fas fa-share"></i>
                    </a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Admin', 'Musculacion', 'Fisioterapia', 'Instructor'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Atletas
                </div>
                <div class="card-body">
                    <i class="fas fa-swimmer fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('athletes.index') }}" class="btn btn-primary btn-block">
                        Acceder &nbsp;
                        <i class="fas fa-share"></i>
                    </a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Admin'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Deportes
                </div>
                <div class="card-body">
                    <i class="fas fa-table-tennis fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('sports.index') }}" class="btn btn-primary btn-block">
                        Acceder &nbsp;
                        <i class="fas fa-share"></i>
                    </a>
                </div>
            </div>
        </div>
        @endcan
    </div>

    {{-- --------------------SEGUNDO BLOQUE------------------ --}}

    <div class="row">
        @can('role', ['Admin', 'Musculacion'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Documentos Musculación
                </div>
                <div class="card-body">
                    <i class="fas fa-dumbbell fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('musculars.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Admin', 'Fisioterapia'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Documentos Fisioterápia
                </div>
                <div class="card-body">
                    <i class="fas fa-user-md fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('physios.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Admin', 'Instructor'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Entrenamientos
                </div>
                <div class="card-body">
                    <i class="fas fa-medal fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('trainings.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan
    </div>


    {{-- --------------------TERCER BLOQUE------------------ --}}
   {{-- <div class="row">
        @can('role', ['Admin', 'Musculacion'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Disponibilidades
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-week fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan
    </div>--}}


    <div class="row">
        @can('role', ['Admin', 'Fisioterapia'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Disponibilidad Citas Fisioterapia
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Admin', 'Musculacion'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Disponibilidad Citas Musculacion
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-week fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('availabilities.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Musculacion'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Confirmacion Citas Musculacion
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-week fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Atleta'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Reservar Citas
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-week fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('availabilities.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan

        @can('role', ['Atleta'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Mis Citas
                </div>
                <div class="card-body">
                    <i class="fas fa-calendar-week fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-block">Acceder &nbsp;
                        <i class="fas fa-share"></i></a>
                </div>
            </div>
        </div>
        @endcan
    </div>

    <div class="row">
        @can('role', ['Usuario Externo'])
        <div class="col-md mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Procesando...
                </div>
            <h3>Tu perfil se encuentra en proceso de aceptación, por favor se paciente mientras se realiza este proceso.
            </h3>
            </div>
            <div class="card text-center">
                <div class="card-header">
                    Salir
                </div>
                <div class="card-body">
                    <i class="fas fa-sign-out-alt fa-5x"></i>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Cerrar Sesión &nbsp;
                        <i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        @endcan
</x-app-layout>

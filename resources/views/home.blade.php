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

        @can('role', ['Admin'])
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
                        Musculación
                    </div>
                    <div class="card-body">
                        <i class="fas fa-dumbbell fa-5x"></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('musculars.index') }}" class="btn btn-primary btn-block">Acceder</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('role', ['Admin', 'Fisioterapia'])
            <div class="col-md mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        Fisioterápia
                    </div>
                    <div class="card-body">
                        <i class="fas fa-user-md fa-5x"></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('physios.index') }}" class="btn btn-primary btn-block">Acceder</a>
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
                        <a href="{{ route('trainings.index') }}" class="btn btn-primary btn-block">Acceder</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    {{-- --------------------TERCER BLOQUE------------------ --}}

    <div class="row">
        @can('role', ['Admin', 'Fisioterapia'])
            <div class="col-md mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        Citas Fisioterapia
                    </div>
                    <div class="card-body">
                        <i class="fas fa-calendar-alt fa-5x"></i>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-block">Acceder</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('role', ['Admin', 'Musculacion'])
            <div class="col-md mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        Citas Musculacion
                    </div>
                    <div class="card-body">
                        <i class="fas fa-calendar-week fa-5x"></i>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-block">Acceder</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>

</x-app-layout>


{{-- <div class="bodyHomePaige">

    <div class="homePaige container-fluid ">

        <!-- Vista del menu principal del Usuario Administrador -->

        @can('role', 'Admin')

            <div class="Admin">

                <div class="row justify-content-center">
                    <div class=" col-sm-12 col-md-6 col-lg-6 ">
                        <h2 class="py-5 display-5 text-center">Administrador</h2>
                    </div>
                </div>

                <div class="row justify-content-center pt-3">
                    <div class=" col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
                        <div class="atleta_registro">
                            <h4 class="">Analizar Solicitud</h4>
                            <i class="d-block fas fa-running p-2"></i>
                            <a href="{{ route('requests.index') }}" class="btn btn-negro">
Acceder
</a>
</div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="fisioterapia_clinica">
        <h4 class="">Fisioterapia</h4>
        <i class="d-block fas fa-user-md p-2"></i>
        <button class="btn btn-negro">Ingresar</button>
    </div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="gimnasio">
        <h4 class="">Gimnasio</h4>
        <i class=" d-block fas fa-dumbbell p-2"></i>
        <button class="btn btn-negro">Ingresar</button>
    </div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="mi_perfil">
        <h4 class="">Mi Perfil</h4>
        <i class="d-block fas fa-user p-2"></i>
        <button onclick="window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
    </div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="Registrar_funcionario">
        <h4>Usuarios</h4>
        <i class="d-block fas fa-swimmer"></i>
        <a href="{{ route('users.index') }}" class="btn btn-negro">Acceder</a>
    </div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="Registrar_funcionario">
        <h4>Deportes</h4>
        <a href="{{ route('sports.index') }}" class="btn btn-negro">Acceder</a>
    </div>
</div>

<div class="col-12 col-sm-2 col-md-2 col-lg-2 text-center aligne-item-center">
    <div class="Registrar_funcionario">
        <h4>Atletas</h4>
        <a href="{{ route('athletes.index') }}" class="btn btn-negro">Acceder</a>
    </div>
</div>

</div>

</div>
@endcan


@can('role', 'Instructor')
<div class="Instructor">

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <h1 class="display-5 text-center py-5">Instructor</h1>
        </div>
    </div>
    <div class="row justify-content-center p-1">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <i class="d-block fas fa-user p-2"></i>
                <button onclick="window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="registro_de_datos_atleta">
                <h4 class="">Registrar datos del atleta</h4>
                <i class="d-block fas fa-address-card p-2"></i>
                <a href="/users/instructor" class="btn btn-negro">Ingresar</a>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="reservar_gimnasio">
                <h4 class="">Reservar Instalaciones</h4>
                <i class=" d-block fas fa-book p-2"></i>
                <button onclick="window.location='{{ Route('booking_form') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>
    </div>

</div>

@endcan



@can('role', 'Atleta')

<div class="Atleta">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <h1 class="main_text_atleta text-center py-5">Atleta</h1>
        </div>
    </div>

    <div class="row justify-content-center p-1">

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="reservar_gimnasio">
                <h4 class="">Reservar Instalaciones</h4>
                <i class=" d-block fas fa-book p-2"></i>
                <button onclick="window.location='{{ Route('booking_form') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <i class="d-block fas fa-user-circle p-2"></i>
                <button onclick="window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="expediente">
                <h4 class="">Ver Expediente</h4>
                <i class="d-block fas fa-id-card-alt p-2"></i>
                <button class="btn btn-negro" onclick="window.location='{{ url('/athletes/seedata') }}'">Ingresar</button>
            </div>
        </div>
    </div>

</div>

@endcan



@can('role', 'Fisioterapia')

<div class="Fisioterapia">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <h2 class="display-5 text-center py-5">Fisioterapia</h2>
        </div>
    </div>

    <div class="row justify-content-center p-1">

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <i class="d-block fas fa-user-circle p-2"></i>
                <button onclick="window.location='{{ route('perfil.atleta') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="expediente">
                <h4 class="">Registrar datos de atleta</h4>
                <i class="d-block fas fa-id-card-alt p-2"></i>
                <button class="btn btn-negro" onclick="window.location='{{ url('/physiotherapy/listAthletes') }}'">Ingresar</button>
            </div>
        </div>
    </div>

</div>


@endcan

@can('role', 'Musculacion')

<div class="Musculacion">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <h2 class="display-5 text-center py-5">Musculación</h2>
        </div>
    </div>

    <div class="row justify-content-center p-1">

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="mi_perfil">
                <h4 class="">Mi Perfil</h4>
                <i class="d-block fas fa-user-circle p-2"></i>
                <button onclick="window.location='{{ route('musculars.index') }}'" class="btn btn-negro">Ingresar</button>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center aligne-item-center">
            <div class="expediente">
                <h4 class="">Registrar datos de atleta</h4>
                <i class="d-block fas fa-id-card-alt p-2"></i>
                <button class="btn btn-negro" onclick="window.location='{{ url('/musculation/catalogAthletes') }}'">Ingresar</button>
            </div>
        </div>
    </div>

</div>

@endcan

</div>
</div> --}}

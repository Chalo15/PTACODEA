<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    @stack('stylesheet')

</head>

<body class="d-flex flex-column h-100">


    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-black-codea">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-codea.gif') }}" alt="" width="25%" height="25%">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav  navbar-right ml-auto">

                        @can('role',['Musculacion','Atleta'])
                        <div x-data="{
                            count:'',
                            notifications: [''],
                            refresh() {
                                axios.get('/notifications/api').then((respuesta) => {
                                this.notifications = respuesta.data;
                                });
                            },
                            read(id) {
                                console.log('Llega a read',id)
                                axios.put('/notifications/${id}/markNotificacion').then((respuesta) => {
                                this.refresh();
                            }).catch((error)=>
                                console.log(error)
                                );
                            },
                            readAll() {
                                axios.put('/notifications/markAll').then((respuesta) => {
                                this.refresh();
                            }).catch((error)=>
                                console.log(error)
                                );
                            },
                            init() {
                                this.refresh();
                            }
                            }" x-init="init()">
                            <li class="nav-item dropdown" x-on:click="refresh()">

                                <a id="navbarDropdown" class="mt-1 ml-2 nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-solid fa-bell"></i> Notificaciones 
                                    <span id="notifyCount" class="badge badge-pill badge-info"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h4 class="d-inline text-left mr-2">Notificaciones</h4>
                                    <button class="btn d-inline" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <button class="dropdown-item" >
                                            <i class="fas fa-check-circle"></i> &nbsp;
                                            Marcar todas como leidas
                                        </button>
                                        <button class="dropdown-item">
                                            <i class="fas fa-trash"></i> &nbsp;
                                            Abrir notificaciones
                                        </button>
                                    </div>
                                    <div class="p-2 text-right d-block">
                                        <button x-on:click="readAll()" class="d-inline mr-3 text-left btn btn-black-codea">MarkAll</button>
                                        <a href="{{route('notifications.index')}}" class="d-inline text-right m-2">Ver todo</a>
                                    </div>
                                    <div class="text-center">

                                        <span id="notifys" class="dropdown-item" ></span>
                                    </div>
                                    @if(auth()->user()->role_id == 6)
                                        <template x-for="notification in notifications" x-bind:key="notification.id">
                                            <li class="dropdown-item">
                                                El atleta 
                                                <span x-text="notification.data.Athlete_name"></span>
                                                <span x-text="notification.data.Athlete_last_name"></span>
                                                reservó una cita
                                                <div class="d-inline">
                                                    <button class="btn" x-on:click="read(notification.id)"><i class="fas fa-check-circle"></i></button>
                                                </div>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                        </template>
                                    @elseif(auth()->user()->role_id == 4)
                                        <template x-for="notification in notifications" x-bind:key="notification.id">
                                            <li class="dropdown-item">
                                                <span x-text="notification.data.Muscular_name"></span> aceptó la reserva
                                                <div class="d-inline">
                                                    <button class="btn" x-on:click="read(notification.id)"><i class="fas fa-check-circle"></i></button>
                                                </div>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                        </template>
                                    @endif
                                    
                                    
                                </div>

                                    
                                
                            </li>
                        </div>
                        

                        @endcan

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @php
                                $user = Auth::user();
                                @endphp
                                <img class="rounded-circle" src="{{ $user->photo ? asset($user->photo) : asset('images/default.png') }}" width="35" height="35"> &nbsp;
                                {{ $user->full_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a href="{{ route('profile.index')}}" class="dropdown-item">
                                    <i class="fas fa-user-circle"></i> &nbsp;
                                    Perfil
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> &nbsp;
                                    Finalizar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="flex-shrink-0 mt-5">
        <div class="container my-5">

            @if(session('status'))
            <x-alert title="{{ session('status')['title'] ?? null }}" color="{{ session('status')['color'] ?? 'info' }}" message="{{ session('status')['message'] ?? session('status') }}" />
            @endif

            {{ $slot }}

        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-black-codea">
        <div class="container text-white-codea text-muted">

            <div class="float-right d-none d-sm-inline">
                {{ 'v' . config('app.version') }}
            </div>

            <strong>Copyright &copy; 2022 <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    @stack('scripts')
</body>

<script>
    let notifications = ['']
    let count = 0
    setInterval('refresh()',500);


    function refresh() {
        axios.get('/notifications/api').then((respuesta) => {
        notifications = respuesta.data;
        count = Object.keys(respuesta.data).length;
        document.getElementById('notifyCount').innerHTML = count
        if(count == 0){
            document.getElementById('notifys').innerHTML = 'No hay notificaciones disponibles'
        }
        });
    }



</script>

</html>

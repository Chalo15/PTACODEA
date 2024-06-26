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

    {{-- Header:Scripts --}}
    @stack('header-script')
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

                        @can('role',['Musculacion','Instructor','Fisioterapia'])
                        <li class="nav-item dropdown">
                            @include('layouts.partials._notifications')
                        </li>
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

    <script src=" https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="  https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    <script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    @stack('scripts')
</body>

</html>
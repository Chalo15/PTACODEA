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

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        main>.container {
            padding: 60px 15px 0;
        }

        .footer>.container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }

        

    </style>

    @stack('stylesheet')

</head>

<body class="d-flex flex-column h-100">

    <header>
        <nav class="navbar navbar-expand-md navbar-black-codea fixed-top bg-black-codea">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-codea.gif') }}" alt="" width="25%" height="25%">
                </a>
            </div>
        </nav>
    </header>

    <main role="main" class="flex-shrink-0 mt-5">
        <div class="container my-5">
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

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> 

    @stack('scripts')

</body>

</html>

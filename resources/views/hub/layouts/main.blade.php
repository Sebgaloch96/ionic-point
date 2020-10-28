<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @env('local')
            <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                <i class="fas fa-cog"></i> You are currently in the development environment
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseenv('testing')
            <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                <i class="fas fa-cog"></i> You are currently in the staging environment
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endenv
    </div>

    <div class="wrapper">
        @include('hub.includes.sidebar')

        <div id="content" class="w-100">
            @include('hub.includes.navbar')

            @yield('breadcrumbs')

            <div class="container-fluid py-1 py-md-4">
                @yield('content')
            </div>                                      
        </div>
    </div>
</body>
</html>

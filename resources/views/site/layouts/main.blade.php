<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/web.js') }}"></script>
</head>
<body>
    <div id="app">
            @env('local')
                <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                    <i class="fas fa-cogs"></i> You are currently in the development environment
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseenv('testing')
                <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                    <i class="fas fa-cogs"></i> You are currently in the staging environment
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endenv

            <header>
                @include('site.includes.navbar')
            </header>

            <main>
                @yield('content')
            </main>

            @if(Request::segment(1) != 'login')
            <footer>
                @include('site.includes.footer')
            </footer>
            @else
            
            @endif
        
    </div>

    @yield('scripts')
</body>
</html>
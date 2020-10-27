<nav class="navbar navbar-expand-md bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('membership') }}">Membership</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutUs') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactUs') }}">Contact us</a>
                </li>
                <li>
                    <a class="btn btn-primary btn-login" href="#">Login</a>
                </li>

                <!-- Authentication Links -->
                <!-- @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endguest -->
            </ul>
        </div>
    </div>
</nav>
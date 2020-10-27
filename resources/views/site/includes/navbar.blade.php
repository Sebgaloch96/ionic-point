<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                <li class="mt-1">
                    <a class="btn btn-primary btn-login" href="#">Login</a>
                </li>
            </ul>
        </div>


    </div>
</nav>
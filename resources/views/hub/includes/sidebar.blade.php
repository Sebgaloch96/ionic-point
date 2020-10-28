<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Ionic Point</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Welcome {{ Auth::user()->name }}!</p>
        <li class="mb-4">
            <a href="{{ route('hub.dashboard') }}"><i class="fas fa-columns"></i> <span class="px-1">Dashboard</span></a>
        </li>
        <li class="">
            <a href=""><i class="fas fa-briefcase"></i> <span class="px-1">Jobs</span></a>
        </li>   
        <li class="">
            <a href=""><i class="fas fa-calendar-alt"></i> <span class="px-1">Calendar</span></a>
        </li>
        <li class="">
            <a href=""><i class="fas fa-folder"></i> <span class="px-1">Files</span></a>
        </li>
        <li class="">
            <a href=""><i class="fas fa-cog"></i> <span class="px-1">Settings</span></a>
        </li>
        <li class="my-4 ">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> <span class="px-1">Logout</span></a>

            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
    </ul>
</nav>
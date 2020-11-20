<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header py-4 px-4">
        <h3>Ionic Point</h3>
    </div>

    <ul class="list-unstyled components">
        <div class="px-4 py-4">
            <p class="mb-0">Welcome {{ Auth::user()->name }}!</p>
        </div>
        <li>
            <a href="{{ route('hub.dashboard') }}"><i class="fas fa-home"></i> <span class="px-1">Dashboard</span></a>
        </li>
        <li class="{{ Request::segment(2) == "jobs" ? "active" : "" }}">
            <hr>
            <p><i class="fas fa-briefcase"></i> <span class="px-1">Jobs</span></p>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('hub.jobs') }}">Find jobs</a>
                </li>
                <li>
                    <a href="{{ route('hub.jobs.manage') }}">Manage jobs</a>
                </li>
            </ul>
        </li>   
        <li>
            <a href="{{ route('hub.calendar') }}"><i class="fas fa-calendar-alt"></i> <span class="px-1">Calendar</span></a>
        </li>
        <li>
            <a href=""><i class="fas fa-folder"></i> <span class="px-1">Files</span></a>
        </li>
        <li>
            <a href=""><i class="fas fa-cog"></i> <span class="px-1">Settings</span></a>
        </li>
        <li>
            <hr>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> <span class="px-1">Logout</span></a>

            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
    </ul>
</nav>
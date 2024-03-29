<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12">
            <ul class="nav px-4 pt-3 pb-3 align-items-center">
                <li class="nav-item">
                    <button type="button" id="sidebarCollapse" class="btn bg-custom-dark text-white rounded-0">
                        <i class="fas fa-align-left"></i>
                    </button>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link text-custom-dark position-relative" href="#">
                        <i class="fas fa-envelope fa-lg"></i> <span class="badge badge-pill badge-info badge-pill-top-right position-absolute">3</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-custom-dark position-relative" href="#" id="notifications" data-toggle="dropdown">
                        <i class="fas fa-bell fa-lg"></i> <span class="badge badge-pill badge-danger badge-pill-top-right position-absolute">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow rounded-0 border-0 p-0" aria-labelledby="notifications">
                        <span class="dropdown-item-text p-3">Notifications <span class="badge badge-pill badge-danger float-right mt-1">5 new</span></span>
                        <div class="dropdown-item p-0">
                            <div class="list-group rounded-0">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </a>
                            </div>
                        </div>         
                    </div>
                </li>
                <li class="nav-item dropdown">    
                    <a class="nav-link text-custom-dark" href="#" id="profile-menu" data-toggle="dropdown">
                        <img src="https://picsum.photos/id/1027/200/300" width="30px" height="30px" class="rounded-circle">
                    </a>    
                    <div class="dropdown-menu dropdown-menu-right shadow rounded-0 border-0" aria-labelledby="profile-menu">
                        <span class="dropdown-item-text">{{ Auth::user()->name }}</span>
                        <a class="dropdown-item" href="#">Your Profile</a>
                        <a class="dropdown-item" href="#">Your Jobs</a>
                        <a class="dropdown-item" href="#">Manage Subscription</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="pr-1">Logout</span> <i class="fas fa-sign-out-alt"></i> 
                        </a>
                        <form id="logout-form d-none" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>            
        </div>
    </div>
</div>
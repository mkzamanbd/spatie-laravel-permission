<header>
    <nav class="navbar page-navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Aside expand button -->
            <div class="expand-button">
                <button class="btn btn-success p-1" onclick="asideExpand()" id="_asideExpand">
                    <i class="bi bi-list-nested"></i>
                </button>
            </div>
            <!-- End aside expand button -->

            <!-- Responsive button -->
            <button class="navbar-toggler p-1 ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <!-- End responsive button -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav my-2 text-end ms-auto mb-lg-0 py-3 py-lg-0">
                    <!-- Help -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            <span class=" me-3 me-lg-1">Help</span>
                            <i class="bi bi-info-circle"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-lg-none me-3">Profile</span>
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu"  aria-labelledby="user-dropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center my-2">
                                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&size=100" class="user-icon" alt="">
                                        <div class="ms-2">
                                            <h6>{{ auth()->user()->name }}</h6>
                                            <div class="text-small">{{ auth()->user()->email }}</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{ route('current-user.show') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.index') }}">User List</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('role.index') }}">User Role</a>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

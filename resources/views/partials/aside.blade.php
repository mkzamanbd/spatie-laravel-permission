<aside class="page-aside">
    <!-- accordion menu -->

    <!-- aside brand -->
    <div class="aside-brand mt-1 mb-3">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo_with_name.svg') }}" alt="">
        </a>
    </div>
    <!-- End aside-brand -->

    <ul class="accordion" id="asideAccordion">
        <li class="accordion-item">
            <a href="{{ route('home') }}" class="single-nav-link {{ $dashboard_active ?? '' }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <h6 class="ps-3 py-1">Basic</h6>

        <li class="accordion-item">
            <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion_item0" aria-expanded="true" aria-controls="accordion_item0">
                <i class="bi bi-people"></i>
                <span>User List</span>
            </a>

            <ul id="accordion_item0" class="accordion-collapse collapse {{ $user_show ?? '' }}" aria-labelledby="accordion_item0" data-bs-parent="#asideAccordion" style="">
                <li><a href="{{ route('user.index') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'user.index' ? 'active' : '' }}" title="Records">Records</a></li>
                <li><a href="{{ route('user.create') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'user.create' ? 'active' : '' }}" title="Create new">Create new</a></li>
            </ul>
        </li>

        <li class="accordion-item">
            <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion_item1" aria-expanded="true" aria-controls="accordion_item1">
                <i class="bi bi-app"></i>
                <span>Roles</span>
            </a>

            <ul id="accordion_item1" class="accordion-collapse collapse {{ $role_show ?? '' }}" aria-labelledby="accordion_item1" data-bs-parent="#asideAccordion" style="">
                <li><a href="{{ route('role.index') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'role.index' ? 'active' : '' }}" title="Records">Records</a></li>
                <li><a href="{{ route('role.create') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'role.create' ? 'active' : '' }}" title="Create new">Create new</a></li>
            </ul>
        </li>
    </ul>
</aside>

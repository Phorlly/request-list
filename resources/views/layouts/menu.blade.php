<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon  fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    @can('view-admin')
        <a href="{{ route('user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Users Management</p>
        </a>
    @endcan
</li>
<li class="nav-item">
    @can('view-admin')
        <a href="{{ route('department') }}" class="nav-link {{ Request::is('department') ? 'active' : '' }}">
            <i class="nav-icon fas fa-hospital"></i>
            <p>Departments</p>
        </a>
    @endcan
</li>
<li class="nav-item">
    @can('view-admin')
        <a href="{{ route('assign') }}" class="nav-link {{ Request::is('assign') ? 'active' : '' }}">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>User to Departments</p>
        </a>
    @endcan
</li>
<li class="nav-item">
    @can('view-admin')
        <a href="{{ route('leave-mission') }}" class="nav-link {{ Request::is('leave-mission') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-check"></i>
            <p>Leave or Mission</p>
        </a>
    @endcan
</li>
<li class="nav-item">
    @can('view-approval')
        <a href="{{ route('leave') }}" class="nav-link {{ Request::is('leave') ? 'active' : '' }}">
            <i class="nav-icon fas fas fa-comment-dots"></i>
            <p>Leave Management</p>
        </a>
    @endcan
</li>
<li class="nav-item">
    @can('view-requester')
        <a href="{{ route('request-leave') }}" class="nav-link {{ Request::is('request-leave') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment"></i>
            <p>Leave</p>
        </a>
    @endcan
</li>

<li class="nav-item">
    @can('view-approval')
        <a href="{{ route('mission') }}" class="nav-link {{ Request::is('mission') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment-alt"></i>
            <p>Mission Management</p>
        </a>
    @endcan
</li>

<li class="nav-item">
    @can('view-requester')
        <a href="{{ route('request-mission') }}" class="nav-link {{ Request::is('request-mission') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment-medical"></i>
            <p>Mission</p>
        </a>
    @endcan
</li>

<li class="nav-item">
    <a href="#" class="nav-link"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>

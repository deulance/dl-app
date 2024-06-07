<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{ route('admin_dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            @can('Manage Users','full access')
            <li class="dropdown {{ request()->is('admin/admins*') ? 'active' : '' }}">
                <a href="{{ route('admin.admins.index') }}" class="nav-link"><i data-feather="user"></i><span>Manage Users</span></a>
            </li>
            @endcan 
            @can('Manage Users','full access')
             <li class="dropdown {{ request()->is('admin/roles*') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="nav-link"><i data-feather="unlock"></i><span>Manage Roles</span></a>
            </li> 
            @endcan   
            @can('View Table','full access')
            <li class="dropdown {{ request()->is('admin/deulanceboard*') ? 'active' : '' }}">
                <a href="{{ route('admin.deulanceboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Tabela</span></a>
            </li>
            @endcan



           
        </ul>
    </aside>
</div>

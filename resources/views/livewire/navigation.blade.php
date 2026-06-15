<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="#">
                    <img src="{{ asset('img/CTB.png') }}" style="max-height: 40px; object-fit: contain;">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item {{ Request::route()->named('dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}" wire:navigate>
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Divider -->
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Otras Acciones</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item {{ Request::route()->named('profile.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('profile.index') ? 'active' : '' }}"
                href="{{ route('profile.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Perfil
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-gray"></i> Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Administración</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">

        <li class="nav-item {{ Request::route()->named('devices_types.index') ? 'active':'' }}">
            <a  class="nav-link {{ Request::route()->named('devices_types.index') ? 'active' : '' }}"
                href="{{ route('devices_types.index') }}" wire:navigate>
                <i class="fas fa-th-large text-yellow"></i> Tipos de dispositivos
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('brands.index') ? 'active':'' }}">
            <a  class="nav-link {{ Request::route()->named('brands.index') ? 'active' : '' }}"
                href="{{ route('brands.index') }}" wire:navigate>
                <i class="fas fa-tags text-yellow"></i> Marcas
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('devices_inventories.index') ? 'active':'' }}">
            <a  class="nav-link {{ Request::route()->named('devices_inventories.index') ? 'active' : '' }}"
                href="{{ route('devices_inventories.index') }}" wire:navigate>
                <i class="fas fa-boxes text-yellow"></i> Inventario de dispositivos
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('users_devs.index') ? 'active':'' }}">
            <a  class="nav-link {{ Request::route()->named('users_devs.index') ? 'active' : '' }}"
                href="{{ route('users_devs.index') }}" wire:navigate>
                <i class="fas fa-user text-green"></i> Usuarios (Préstamos)
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('check_in_logs.index') ? 'active':'' }}">
            <a  class="nav-link {{ Request::route()->named('check_in_logs.index') ? 'active' : '' }}"
                href="{{ route('check_in_logs.index') }}" wire:navigate>
                <i class="fas fa-exchange-alt text-blue"></i> Devolver equipo(s)
            </a>
        </li>
    </ul>
</div>

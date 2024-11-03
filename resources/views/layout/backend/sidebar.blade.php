<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-images"></i>

        </div>
        <div class="sidebar-brand-text mx-3">GALLERY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    {{-- @can('user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>  
    @elseCan('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Agenda</span></a>
    </li>
    @endCan --}}

    {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dataMasterDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-database"></i>
            <span>Kategori</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dataMasterDropdown">
            <a class="dropdown-item" href="{{ route('informasi.index') }}">
                <i class="fas fa-fw fa-user"></i> Informasi
            </a>
            <a class="dropdown-item" href="{{ route('Agenda.index') }}">
                <i class="fas fa-fw fa-user"></i> Agenda
            </a>
        </div>
    </li> --}}
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('informasi.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Informasi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Agenda.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Agenda</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Gallery</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Kategori</span></a>
    </li>

   


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    
    <!-- Nav Item - Charts -->
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
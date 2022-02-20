<ul class="navbar-nav bg-light sidebar sidebar-dark accordions" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <img src="{{ asset('images/LOGO JPG.png') }}" class="img-fluid" width="50px" alt="Responsive image">
        <div class="sidebar-brand-text mx-3">KPRSTTNF</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item @yield('active-kandidat')">
        <a class="nav-link" href="/admin/kandidat"> 
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Kandidat</span></a>
    </li>

    <!-- Nav Item - Voting -->
    <li class="nav-item @yield('active-voting')">
        <a class="nav-link" href="/admin/voting">
            <i class="fas fa-fw fas fa-poll"></i>
            <span>Voting</span></a>
    </li>

    {{-- <!-- Divider -->
    <hr class="sidebar-divider"> --}}

    <!-- Nav Item - Mahasiswa -->
    <li class="nav-item @yield('active-users')">
        <a class="nav-link" href="/admin/mahasiswa">
            <i class="fas fa-fw fa-table"></i>
            <span>Mahasiswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-2">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline bg-primay">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

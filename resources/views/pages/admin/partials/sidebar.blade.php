<ul class="navbar-nav bg-light sidebar sidebar-dark accordions" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <img src="{{ asset('img/logo-v2.png') }}" class="img-fluid" width="50px" alt="Responsive image">
        <div class="sidebar-brand-text mx-3">KPRSTTNF</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        <a class="nav-link" href="/admin">
            <i class="bi bi-database-fill"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @yield('active-kandidat')">
        <a class="nav-link" href="/admin/kandidat">
            <i class="bi bi-people-fill"></i>
            <span>Kandidat</span></a>
    </li>

    <!-- Nav Item - Voting -->
    <li class="nav-item @yield('active-voting')">
        <a class="nav-link" href="/admin/voting">
            <i class="bi bi-check2-square"></i>
            <span>Voting</span></a>
    </li>

    {{-- <!-- Divider -->
    <hr class="sidebar-divider"> --}}

    <!-- Nav Item - Mahasiswa -->
    <li class="nav-item @yield('active-users')">
        <a class="nav-link" href="/admin/mahasiswa">
            <i class="bi bi-person-fill-gear"></i>
            <span>Mahasiswa</span></a>
    </li>

    <li class="nav-item @yield('active-saran')">
        <a class="nav-link" href="/admin/saran">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Kritik Saran</span></a>
    </li>

    <li class="nav-item @yield('active-saran')">
        <a class="nav-link" href="/admin/cek">
            <i class="bi bi-search"></i>
            <span>Search Password</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-2">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline bg-primay">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
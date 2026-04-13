<nav class="navbar navbar-expand-xl navbar-dark fixed-top main-navbar transition-all"
    style="background-color: #fff; border-bottom: 2px solid #009b4d; padding: 5px 0;">
    
    <div class="container-fluid px-lg-4">
        {{-- Brand Logo & Text --}}
        <a class="navbar-brand d-flex align-items-center me-1 me-xl-3" href="{{ url('/') }}">
            <img src="{{ asset('assets/icons/favicon-sekolah.ico') }}" height="50" width="50" alt="Logo" class="me-2">
            
            <div class="brand-text">
                {{-- Nama Yayasan --}}
                <span class="d-block fw-bold lh-1"
                    style="font-size: clamp(0.6rem, 0.8vw, 0.7rem); color: #008156; letter-spacing: 0.2px;">
                    Yayasan Al-Husainiyyah Muthoyyibah
                </span>

                {{-- Nama Sekolah --}}
                <span class="d-block fw-black lh-sm"
                    style="font-size: clamp(0.85rem, 1.1vw, 1rem); color: #008156; font-weight: 800; margin: 1px 0;">
                    SMP AL-HUSAINIYYAH
                </span>
                
                <div style="line-height: 1.2;">
                    {{-- Slogan --}}
                    <small class="fw-bold d-none d-sm-inline-block" style="font-size: 0.55rem; text-transform: uppercase;">
                        <span style="color: #3498db;">Cerdas</span>,
                        <span style="color: #f1c40f;">Berkarakter</span>,
                        <span style="color: #e67e22;">Religius</span>
                    </small>
                    {{-- ALAMAT: Sekarang muncul di layar laptop (LG) ke atas --}}
                    <div class="d-none d-lg-block text-muted fw-normal" 
                        style="font-size: 0.5rem; letter-spacing: -0.1px;">
                        JL. Bukit Jarian No. 29/165D Kel. Hegarmanah, Kota Bandung
                    </div>
                </div>
            </div>
        </a>

        {{-- Mobile Toggler --}}
        <button class="navbar-toggler border-0 p-1 shadow-none order-3 ms-2" type="button" 
            data-bs-toggle="collapse" data-bs-target="#mainNav" 
            style="background-color: #008156;">
            <span class="navbar-toggler-icon" style="width: 20px; height: 20px;"></span>
        </button>

        {{-- Right Side: Auth Buttons --}}
        <div class="d-flex align-items-center order-lg-3 gap-1 gap-md-2 ms-auto ms-xl-3">
            @auth
                @if (auth()->user()->hasRole('teacher'))
                    <a href="{{ route('berita.create') }}"
                        class="btn btn-success rounded-pill px-2 px-md-3 btn-sm fw-medium d-flex align-items-center justify-content-center"
                        style="font-size: 0.65rem; height: 32px; background-color: #008156; border: none;">
                        <i class="bi bi-pencil-fill me-1"></i> <span class="d-none d-md-inline">Tulis</span>
                    </a>
                @endif

                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                    <a href="{{ url('/admin') }}"
                        class="btn btn-primary rounded-pill px-2 px-md-3 btn-sm fw-medium d-flex align-items-center justify-content-center"
                        style="font-size: 0.65rem; height: 32px; border: none;">
                        Dashboard Panel
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary rounded-pill px-2 px-md-3 btn-sm fw-medium"
                        style="font-size: 0.65rem; height: 32px;">Logout</button>
                </form>
            @else
                <a href="{{ url('/admin/login') }}"
                    class="btn btn-outline-success rounded-pill px-2 px-md-3 btn-sm fw-medium d-flex align-items-center justify-content-center"
                    style="font-size: 0.65rem; height: 32px; color: #008156; border-color: #008156;">
                    <i class="bi bi-person-circle me-1"></i> 
                    <span class="d-none d-sm-inline">Login Guru/Admin</span>
                    <span class="d-inline d-sm-none">Login</span>
                </a>
            @endauth
        </div>

        {{-- Main Navigation Links --}}
        <div class="collapse navbar-collapse order-lg-2" id="mainNav">
            <ul class="navbar-nav mx-auto" style="font-size: 0.75rem; font-weight: 600;">
                <li class="nav-item">
                    <a class="nav-link px-xl-2 px-lg-1 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-xl-2 px-lg-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="{{ url('/profil/profil-sekolah') }}">Profil Sekolah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/data-guru') }}">Data Guru</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/program-unggulan') }}">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/fasilitas') }}">Fasilitas</a></li>
                    </ul>
                </li>
                {{-- MENU EKSTRAKURIKULER --}}
                <li class="nav-item">
                    <a class="nav-link px-xl-2 px-lg-1 {{ request()->is('ekstrakulikuler*') ? 'active' : '' }}" href="{{ url('/ekstrakulikuler') }}">
                        <span class="d-none d-xl-inline">Ekstrakurikuler</span>
                        <span class="d-inline d-xl-none">Ekskul</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-xl-2 px-lg-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="{{ url('/pengumuman') }}">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="{{ url('/berita') }}">Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link px-xl-2 px-lg-1" href="{{ url('/ppdb') }}">SPMB</a></li>
                <li class="nav-item"><a class="nav-link px-xl-2 px-lg-1" href="{{ url('/prestasi') }}">Prestasi</a></li>
                <li class="nav-item"><a class="nav-link px-xl-2 px-lg-1" href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
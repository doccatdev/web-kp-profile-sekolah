<nav class="navbar navbar-expand-lg navbar-dark fixed-top main-navbar transition-all">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('assets/icons/sekolah-ico.ico') }}" height="45" width="45" alt="Logo" class="me-2">
            <div class="brand-text">
                <span class="d-block fw-bold lh-1 brand-name"
                    style="font-size: 1rem; letter-spacing: 0.5px; color: var(--emerald-green);">
                    SMP AL HUSAINIYAH
                </span>

                <small class="fw-normal brand-sub"
                    style="font-size: 0.65rem; opacity: 0.9; color: var(--emerald-green);">
                    RELIGIUS & BERPRESTASI
                </small>
            </div>
        </a>

        <div class="d-flex align-items-center order-lg-3 gap-2">
            <a href="{{ url('/admin') }}"
                class="btn btn-outline-light rounded-pill px-3 btn-sm fw-medium d-flex align-items-center"
                style="font-size: 0.75rem; border-width: 1.5px; height: 32px;">
                Portal Admin
            </a>

            <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav">
                <span class="navbar-toggler-icon" style="width: 24px;"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse order-lg-2" id="mainNav">
            <ul class="navbar-nav me-auto ps-lg-3 gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="#"
                        role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="{{ url('/profil/profil-sekolah') }}">Profil Sekolah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/data-guru') }}">Data Guru</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/program-unggulan') }}">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/fasilitas') }}">Fasilitas</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('ekstrakulikuler*') ? 'active' : '' }}"
                        href="{{ url('/ekstrakulikuler') }}">Ekstrakurikuler</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('pengumuman*') || request()->is('berita*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="{{ url('/pengumuman') }}">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="{{ url('/berita') }}">Berita</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('ppdb*') ? 'active' : '' }}"
                        href="{{ url('/ppdb') }}">PPDB</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('prestasi*') ? 'active' : '' }}"
                        href="{{ url('/prestasi') }}">Prestasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}"
                        href="{{ url('/kontak') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

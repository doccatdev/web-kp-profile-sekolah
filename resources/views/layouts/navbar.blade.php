 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/icons/edited-photo.ico') }}" height="55" width="55" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="{{ url('/profil/sambutan') }}" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/profil/sambutan') }}">Sambutan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/profil-sekolah') }}">Profil Sekolah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/profil/visi-misi') }}">Visi & Misi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('galeri*') ? 'active' : '' }}" href="{{ url('/galeri') }}" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/galeri') }}">Foto Kegiatan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/galeri/ekstrakulikuler') }}">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('video*') ? 'active' : '' }}" href="{{ url('/video') }}">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="{{ url('/admin') }}" class="btn btn-danger">Login</a>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->

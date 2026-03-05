 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
     <div class="container">
         <a class="navbar-brand" href="{{ url('/') }}">
             <img src="{{ asset('assets/icons/sekolah-ico.ico') }}" height="55" width="55" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 {{-- Beranda --}}
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                         href="{{ url('/') }}">Beranda</a>
                 </li>

                 {{-- Profil (Dropdown) --}}
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="#"
                         role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Profil
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{ url('/profil/profil-sekolah') }}">Profil Sekolah</a></li>
                         <li><a class="dropdown-item" href="{{ url('/profil/sejarah') }}">Sejarah Singkat</a></li>
                         <li><a class="dropdown-item" href="{{ url('/profil/visi-misi') }}">Visi & Misi</a></li>
                         <li><a class="dropdown-item" href="{{ url('/profil/data-guru') }}">Data Guru
                             </a></li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="{{ url('/program-unggulan') }}">Program Unggulan</a></li>
                         <li><a class="dropdown-item" href="{{ url('/fasilitas') }}">Sarana & Prasarana</a></li>
                     </ul>
                 </li>

                 {{-- Ekstrakulikuler --}}
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('ekstrakulikuler*') ? 'active' : '' }}"
                         href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a>
                 </li>

                 {{-- Informasi (Dropdown: Pengumuman & Berita) --}}
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle {{ request()->is('pengumuman*') || request()->is('berita*') ? 'active' : '' }}"
                         href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Informasi
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{ url('/pengumuman') }}">Pengumuman</a></li>
                         <li><a class="dropdown-item" href="{{ url('/berita') }}">Berita</a></li>
                     </ul>
                 </li>

                 {{-- PPDB --}}
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('ppdb*') ? 'active' : '' }}"
                         href="{{ url('/ppdb') }}">PPDB</a>
                 </li>

                 {{-- Prestasi --}}
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('prestasi*') ? 'active' : '' }}"
                         href="{{ url('/prestasi') }}">Prestasi</a>
                 </li>

                 {{-- Kontak --}}
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}"
                         href="{{ url('/kontak') }}">Kontak</a>
                 </li>
             </ul>
             <div class="d-flex">
                 <a href="{{ url('/admin') }}" class="btn btn-danger">Login</a>
             </div>
         </div>
     </div>
 </nav>
 <!-- End Navbar -->

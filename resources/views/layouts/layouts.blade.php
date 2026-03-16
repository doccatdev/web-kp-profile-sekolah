<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/icons/sekolah-ico.ico') }}">
    <title>SMP Al Husainiyah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    <section id="footer" class="bg-white border-top">
        <div class="container py-5">
            <footer>
                <div class="row align-items-start g-4" data-aos="fade-up">
                    {{-- Navigasi --}}
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <ul class="nav flex-column gap-1 list-unstyled text-muted">
                            <li><a href="{{ url('/profil/profil-sekolah') }}"
                                    class="text-decoration-none text-muted">Profil</a></li>
                            <li><a href="{{ url('/ekstrakulikuler') }}"
                                    class="text-decoration-none text-muted">Ekstrakulikuler</a></li>
                            <li><a href="{{ url('/ppdb') }}" class="text-decoration-none text-muted">PPDB</a></li>
                            <li><a href="{{ url('/prestasi') }}" class="text-decoration-none text-muted">Prestasi</a>
                            </li>
                            <li><a href="{{ url('/kontak') }}" class="text-decoration-none text-muted">Kontak</a></li>
                        </ul>
                    </div>

                    {{-- Media Sosial --}}
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Media Sosial Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/SMPALHUSAINIYYAH/" target="_blank" class="text-dark"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="https://www.instagram.com/smpalhusainiyyah_official/" target="_blank" class="text-dark"><i class="bi bi-instagram fs-5"></i></a>
                            <a href="https://www.youtube.com/@SMPALHUSAINIYYAH_OFFICIAL" target="_blank" class="text-dark"><i class="bi bi-youtube fs-5"></i></a>
                            <a href="#" target="_blank" class="text-dark"><i class="bi bi-tiktok fs-5"></i></a>
                        </div>
                    </div>

                    {{-- Kontak Kami --}}
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Kontak Kami</h5>
                        <ul class="list-unstyled text-muted small">
                            @if ($kontak)
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bi bi-telephone-fill me-2 text-success fs-5"></i>
                                    <span class="text-break">{{ $kontak->phone }}</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    {{-- Ikon disamakan dengan gambar: bi-envelope-at-fill --}}
                                    <i class="bi bi-envelope-at-fill me-2 text-success fs-5"></i>
                                    <span class="text-break">{{ $kontak->email }}</span>
                                </li>
                            @else
                                <li class="mb-2 text-muted small">Data kontak belum tersedia</li>
                            @endif
                        </ul>
                    </div>

                    {{-- Alamat Sekolah --}}
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                        <div class="d-flex">
                            <i class="bi bi-geo-alt-fill me-2 text-success fs-5"></i>
                            <p class="text-muted small mb-0 text-break">
                                {{ $kontak->address ?? 'Alamat belum diatur di admin panel' }}
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

    <script>
        const navbar = document.querySelector(".fixed-top");
        let lastScrollY = window.scrollY;

        window.addEventListener("scroll", () => {
            if (!navbar) return; // Guard clause jika navbar tidak ada class fixed-top

            const scrollY = window.scrollY;
            if (scrollY > 100) {
                navbar.classList.add("scroll-nav-activate", "text-nav-activate");
                navbar.classList.remove("navbar-dark");
                if (scrollY > lastScrollY) {
                    navbar.classList.add("navbar-hidden");
                } else {
                    navbar.classList.remove("navbar-hidden");
                }
            } else {
                navbar.classList.remove("scroll-nav-activate", "text-nav-activate", "navbar-hidden");
                navbar.classList.add("navbar-dark");
            }
            lastScrollY = scrollY;
        });
    </script>
</body>

</html>

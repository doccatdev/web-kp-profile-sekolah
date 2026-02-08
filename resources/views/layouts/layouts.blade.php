<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href={{ asset('assets/icons/edited-photo.ico') }}>
    <title>SMP Al Husainiyah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- CSS Styling Berita -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Library Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <section id="footer" class="bg-white">
        <div class="container py-4">
            <footer>
                <div class="row align-items-start g-4" data-aos="fade-up">
                    <!-- Navigasi -->
                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <ul class="nav flex-column gap-1 list-unstyled">
                            <li class="nav-item"><a href="{{ url('/profil/sambutan') }}" class="nav-link py-1 px-0 text-muted">Profil</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('/berita') }}" class="nav-link py-1 px-0 text-muted">Berita</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('/galeri') }}" class="nav-link py-1 px-0 text-muted">Galeri</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('/video') }}" class="nav-link py-1 px-0 text-muted">Video</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('/kontak') }}" class="nav-link py-1 px-0 text-muted">Kontak</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Media Sosial -->
                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <h5 class="fw-inter fw-bold mb-3">Media Sosial Kami</h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="" target="_blank" class="text-decoration-none text-dark"
                                aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="" target="_blank" class="text-decoration-none text-dark"
                                aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
                            <a href="" target="_blank" class="text-decoration-none text-dark"
                                aria-label="YouTube"><i class="bi bi-youtube fs-5"></i></a>
                            <a href="" target="_blank" class="text-decoration-none text-dark"
                                aria-label="TikTok"><i class="bi bi-tiktok fs-5"></i></a>
                        </div>
                    </div>
                    <!-- Kontak Kami -->
                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <h5 class="fw-bold mb-3">Kontak Kami</h5>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i>(022) 2041235</li>
                            <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i>smp.alhusainiyyah@gmail.com
                            </li>
                        </ul>
                    </div>
                    <!-- Alamat Sekolah -->
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                        <p>
                            Jl. Bukit Jarian Dalam No. 29/165 D Ciumbuleuit
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- Script JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

    <!-- Script JS Scroll Navbar -->
    <script>
        const navbar = document.querySelector(".fixed-top");
        let lastScrollY = window.scrollY;

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;

            if (scrollY > 100) {
                navbar.classList.add("scroll-nav-activate");
                navbar.classList.add("text-nav-activate");
                navbar.classList.remove("navbar-dark");
                if (scrollY > lastScrollY) {
                    navbar.classList.add("navbar-hidden");
                } else {
                    navbar.classList.remove("navbar-hidden");
                }
            } else {
                navbar.classList.remove("scroll-nav-activate");
                navbar.classList.remove("text-nav-activate");
                navbar.classList.add("navbar-dark");
                navbar.classList.remove("navbar-hidden");
            }

            lastScrollY = scrollY;
        });
    </script>
    <!-- End Script JS -->

</body>

</html>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo e(asset('assets/icons/sekolah-ico.ico')); ?>">
    <title>SMP Al Husainiyah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>

<body>

    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <section id="footer" class="bg-white border-top">
        <div class="container py-5">
            <footer>
                <div class="row align-items-start g-4" data-aos="fade-up">
                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <ul class="nav flex-column gap-1 list-unstyled text-muted">
                            <li><a href="<?php echo e(url('/profil/profil-sekolah')); ?>"
                                    class="text-decoration-none text-muted">Profil</a></li>
                            <li><a href="<?php echo e(url('/ekstrakulikuler')); ?>"
                                    class="text-decoration-none text-muted">Ekstrakulikuler</a></li>
                            <li><a href="<?php echo e(url('/ppdb')); ?>" class="text-decoration-none text-muted">PPDB</a></li>
                            <li><a href="<?php echo e(url('/prestasi')); ?>" class="text-decoration-none text-muted">Prestasi</a>
                            </li>
                            <li><a href="<?php echo e(url('/kontak')); ?>" class="text-decoration-none text-muted">Kontak</a></li>
                        </ul>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Media Sosial Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="#" target="_blank" class="text-dark"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="#" target="_blank" class="text-dark"><i class="bi bi-instagram fs-5"></i></a>
                            <a href="#" target="_blank" class="text-dark"><i class="bi bi-youtube fs-5"></i></a>
                            <a href="#" target="_blank" class="text-dark"><i class="bi bi-tiktok fs-5"></i></a>
                        </div>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Kontak Kami</h5>
                        <ul class="list-unstyled text-muted small">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kontak): ?>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bi bi-telephone-fill me-2 text-success fs-5"></i>
                                    <span class="text-break"><?php echo e($kontak->phone); ?></span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    
                                    <i class="bi bi-envelope-at-fill me-2 text-success fs-5"></i>
                                    <span class="text-break"><?php echo e($kontak->email); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="mb-2 text-muted small">Data kontak belum tersedia</li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                        <div class="d-flex">
                            <i class="bi bi-geo-alt-fill me-2 text-success fs-5"></i>
                            <p class="text-muted small mb-0 text-break">
                                <?php echo e($kontak->address ?? 'Alamat belum diatur di admin panel'); ?>

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
<?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/layouts/layouts.blade.php ENDPATH**/ ?>
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

<body class="bg-light">

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
                            <li><a href="<?php echo e(url('/profil/profil-sekolah')); ?>" class="text-decoration-none text-muted small">Profil</a></li>
                            <li><a href="<?php echo e(url('/ekstrakulikuler')); ?>" class="text-decoration-none text-muted small">Ekstrakulikuler</a></li>
                            <li><a href="<?php echo e(url('/berita')); ?>" class="text-decoration-none text-muted small">Berita</a></li>
                            <li><a href="<?php echo e(url('/pengumuman')); ?>" class="text-decoration-none text-muted small">Pengumuman</a></li>
                            <li><a href="<?php echo e(url('/ppdb')); ?>" class="text-decoration-none text-muted small">PPDB</a></li>
                            <li><a href="<?php echo e(url('/prestasi')); ?>" class="text-decoration-none text-muted small">Prestasi</a></li>
                            <li><a href="<?php echo e(url('/kontak')); ?>" class="text-decoration-none text-muted small">Kontak</a></li>
                        </ul>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Media Sosial Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/SMPALHUSAINIYYAH/" target="_blank" class="text-dark"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="https://www.instagram.com/smpalhusainiyyah_official/" target="_blank" class="text-dark"><i class="bi bi-instagram fs-5"></i></a>
                            <a href="https://www.youtube.com/@SMPALHUSAINIYYAH_OFFICIAL" target="_blank" class="text-dark"><i class="bi bi-youtube fs-5"></i></a>
                        </div>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Kontak Kami</h5>
                        <ul class="list-unstyled text-muted small">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone-fill me-2 text-success fs-5"></i>
                                <span class="text-break"><?php echo e($kontak->phone ?? '-'); ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope-at-fill me-2 text-success fs-5"></i>
                                <span class="text-break"><?php echo e($kontak->email ?? '-'); ?></span>
                            </li>
                        </ul>
                    </div>

                    
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                        <div class="d-flex small text-muted">
                            <i class="bi bi-geo-alt-fill me-2 text-success fs-5"></i>
                            <p class="mb-0 text-break">
                                <?php echo e($kontak->address ?? 'Alamat belum diatur'); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <hr class="my-4 opacity-25">
                <p class="text-center small text-muted mb-0">&copy; <?php echo e(date('Y')); ?> SMP Al Husainiyah. All rights reserved.</p>
            </footer>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allUpdates) && $allUpdates->count() > 0): ?>
        <div id="update-toast" class="card shadow-lg border-0 p-3"
             style="position: fixed; bottom: 30px; right: 30px; z-index: 9999; max-width: 320px; display: none; border-right: 5px solid #198754 !important;">

            <div class="d-flex align-items-start gap-2">
                <div class="text-success flex-shrink-0 pt-1">
                    <i class="bi bi-megaphone-fill fs-5"></i>
                </div>

                <div id="toastCarousel" class="carousel slide flex-grow-1" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                            <?php
                                // AMBIL JUDUL (Prioritas judul_pengumuman buat PPDB/Pengumuman lu)
                                $title = $item->judul_pengumuman ?? $item->news_title ?? $item->title ?? 'Update Baru';

                                // DETEKSI TIPE & LINK
                                $type = 'Info'; $bg = 'bg-secondary'; $link = '#';

                                if($item instanceof \App\Models\News) {
                                    $type = 'Berita'; $bg = 'bg-success'; $link = url('/berita/'.$item->slug);
                                } elseif($item instanceof \App\Models\Prestasi) {
                                    $type = 'Prestasi'; $bg = 'bg-primary'; $link = url('/prestasi/'.$item->slug);
                                } elseif($item instanceof \App\Models\PpdbInfo) {
                                    $type = 'PPDB'; $bg = 'bg-warning text-dark'; $link = url('/ppdb');
                                } elseif($item instanceof \App\Models\PengumumanSekolah) {
                                    $type = 'Pengumuman'; $bg = 'bg-info text-dark'; $link = url('/pengumuman/'.$item->slug);
                                }
                            ?>

                            <span class="badge <?php echo e($bg); ?> mb-1" style="font-size: 9px;"><?php echo e(strtoupper($type)); ?></span>
                            <p class="fw-bold mb-1 text-dark" style="font-size: 13px; line-height: 1.3;">
                                <?php echo e(Str::limit($title, 60)); ?>

                            </p>
                            <a href="<?php echo e($link); ?>" class="small fw-bold text-success text-decoration-none d-flex align-items-center" style="font-size: 11px;">
                                Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <button type="button" class="btn-close ms-auto shadow-none" style="font-size: 10px;" onclick="hideToast()"></button>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Munculkan notifikasi tiap refresh
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('update-toast');
            if(toast) {
                // Delay 1.5 detik biar gak kaget
                setTimeout(() => { 
                    toast.style.display = 'block'; 
                }, 1500);
            }
        });

        function hideToast() {
            document.getElementById('update-toast').style.display = 'none';
        }
    </script>
</body>
</html><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/layouts/layouts.blade.php ENDPATH**/ ?>
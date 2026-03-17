

<?php $__env->startSection('content'); ?>
    <?php
        $title = $title ?? ucwords(str_replace('-', ' ', $id ?? 'Detail Ekstrakurikuler'));
        if (!isset($data)) {
            $data = (object) [
                'title' => $title,
                'image' => null,
                'description' =>
                    '<p>Kegiatan Ekstrakurikuler ' .
                    $title .
                    ' ditujukan untuk mengembangkan bakat dan minat siswa secara terarah dan profesional.</p>',
            ];
        }
    ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="<?php echo e($data->image ?? asset('assets/images/activity-03.jpg')); ?>"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                alt="<?php echo e($title ?? 'Detail Ekstrakurikuler'); ?>">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('ekstrakulikuler.index')); ?>"
                                class="text-white text-decoration-none">Ekstrakurikuler</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-0 bg-white">
                            <div class="konten-berita">
                                <h2 class="fw-bold mb-3"><?php echo e($title ?? 'Detail Ekstrakurikuler'); ?></h2>


                                <div class="text-secondary body-text mb-5"
                                    style="line-height: 1.8; text-align: justify; color: #4b5563;">
                                    <?php echo $data->description ??
                                        '<p>Informasi detail mengenai ekstrakurikuler ini akan segera ditambahkan oleh pengurus terkait. Pantau terus update terbarunya!</p>'; ?>

                                </div>

                                <h5 class="fw-bold text-dark mt-5 mb-3">Galeri Kegiatan <?php echo e($title); ?></h5>
                                <div id="ekskulGallery" class="carousel slide mb-4" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#ekskulGallery" data-bs-slide-to="0"
                                            class="active" aria-current="true"></button>
                                        <button type="button" data-bs-target="#ekskulGallery"
                                            data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#ekskulGallery"
                                            data-bs-slide-to="2"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="3000">
                                            <img src="<?php echo e(asset('assets/images/activity-01.jpg')); ?>"
                                                class="d-block w-100 object-fit-cover" style="height: 400px;"
                                                alt="Galeri 1">
                                        </div>
                                        <div class="carousel-item" data-bs-interval="3000">
                                            <img src="<?php echo e(asset('assets/images/activity-02.jpg')); ?>"
                                                class="d-block w-100 object-fit-cover" style="height: 400px;"
                                                alt="Galeri 2">
                                        </div>
                                        <div class="carousel-item" data-bs-interval="3000">
                                            <img src="<?php echo e(asset('assets/images/activity-03.jpg')); ?>"
                                                class="d-block w-100 object-fit-cover" style="height: 400px;"
                                                alt="Galeri 3">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#ekskulGallery"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                            aria-hidden="true"
                                            style="width: 2.5rem; height: 2.5rem; background-size: 50%;"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#ekskulGallery"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                            aria-hidden="true"
                                            style="width: 2.5rem; height: 2.5rem; background-size: 50%;"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            
                            <div class="mt-5 border-top pt-4">
                                <a href="<?php echo e(route('ekstrakulikuler.index')); ?>"
                                    class="btn btn-outline-success rounded-pill px-4">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Ekskul
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/ekstrakulikuler/detail.blade.php ENDPATH**/ ?>
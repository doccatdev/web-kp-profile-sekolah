<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 350px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.9), rgba(0, 0, 0, 0.2)); z-index: 1;"></div>
            <img src="<?php echo e(asset('assets/images/school-banner.jpg')); ?>" class="w-100 h-100 object-fit-cover">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-4" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Beranda</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/profil/data-guru"
                                class="text-white text-decoration-none">Guru</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page"><?php echo e($data->nama); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <img src="<?php echo e($data->foto ? asset('storage/' . $data->foto) : asset('assets/images/default-avatar.jpg')); ?>"
                        class="rounded-4 shadow shadow-lg object-fit-cover w-100"
                        style="max-width: 320px; aspect-ratio: 3/4; border: 5px solid #f8f9fa" alt="<?php echo e($data->nama); ?>">
                </div>

                <div class="col-md-8">
                    <h2 class="fw-bold mb-4"><?php echo e($data->nama); ?></h2>

                    <div class="card border-0 bg-light rounded-4 p-4 shadow-sm mb-4">
                        <div class="row g-3">
                            <div class="col-sm-4 fw-bold text-secondary">Jabatan</div>
                            <div class="col-sm-8">: <?php echo e($data->jabatan); ?></div>

                            <div class="col-sm-4 fw-bold text-secondary">Mata Pelajaran</div>
                            <div class="col-sm-8">: <?php echo e($data->mata_pelajaran ?? '-'); ?></div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="<?php echo e(route('profil.data-guru')); ?>" class="btn btn-secondary btn-sm rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/pengajar/detail.blade.php ENDPATH**/ ?>
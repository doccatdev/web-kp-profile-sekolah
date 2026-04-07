<?php $__env->startSection('content'); ?>
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold" data-aos="fade-down">Sarana & Prasarana</h1>
            <p class="lead mb-0 opacity-75" data-aos="fade-up">Fasilitas modern untuk mendukung pembelajaran siswa</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card border-0 rounded-4 shadow-sm h-100 p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                                <i class="<?php echo e($f->icon_class ?? 'bi bi-building'); ?> fs-3"></i>
                            </div>
                            <h4 class="fw-bold mb-3"><?php echo e($f->nama_fasilitas); ?></h4>
                            <p class="text-muted mb-4 flex-grow-1"><?php echo e($f->deskripsi_singkat); ?></p>
                            <a href="<?php echo e(route('fasilitas.detail', $f->slug)); ?>" class="btn btn-emerald w-100 rounded-pill mt-auto">
                                Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-md-8 text-center py-5" data-aos="fade-up">
                        <div class="mb-4">
                            <i class="bi bi-info-circle display-1 text-muted opacity-25"></i>
                        </div>
                        <h3 class="fw-bold text-dark">Data Belum Tersedia</h3>
                        <p class="text-muted">Informasi sedang dalam tahap pembaruan.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/fasilitas/fasilitas.blade.php ENDPATH**/ ?>
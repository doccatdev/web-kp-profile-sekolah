<?php $__env->startSection('content'); ?>
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm" data-aos="fade-down">Kurikulum & Kegiatan</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Program Unggulan</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Program komprehensif SMP Al-Husainiyyah untuk memaksimalkan potensi akademik dan karakter islami siswa.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container pb-5">
            <div class="row g-4 justify-content-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $programUnggulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                        <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                            <img src="<?php echo e(asset('storage/' . $item->thumbnail)); ?>" class="card-img-top object-fit-cover" style="height: 220px;" alt="<?php echo e($item->nama_program); ?>">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex">
                                        <i class="<?php echo e($item->icon_class ?? 'bi bi-star-fill'); ?> fs-5"></i>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill small"><?php echo e($item->badge_text ?? 'Program'); ?></span>
                                </div>
                                <h5 class="fw-bold mb-2 text-dark"><?php echo e($item->nama_program); ?></h5>
                                <p class="small text-muted mb-4 flex-grow-1"><?php echo e($item->deskripsi_singkat); ?></p>
                                <a href="<?php echo e(route('program-unggulan.detail', $item->slug)); ?>" class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-md-8 text-center py-5" data-aos="fade-up">
                        <i class="bi bi-info-circle display-1 text-muted opacity-25"></i>
                        <h3 class="fw-bold text-dark mt-3">Data Belum Tersedia</h3>
                        <p class="text-muted">Informasi program unggulan sedang dalam tahap pembaruan.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/program-unggulan/index.blade.php ENDPATH**/ ?>
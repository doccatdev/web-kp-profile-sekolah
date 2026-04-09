<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="<?php echo e(asset('storage/' . $ekskul->thumbnail)); ?>" class="detail-thumb-bg__img"
                    alt="<?php echo e($ekskul->nama_ekskul); ?>">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start"
                style="z-index: 2;">
                <h1 class="text-white fw-bold display-5 mb-0" data-aos="fade-up"><?php echo e($ekskul->nama_ekskul); ?></h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-2 text-start">
            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-light flex-wrap">
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                    style="width: 48px; height: 48px;">
                    <i class="bi bi-person-badge fs-5"></i>
                </div>
                <div>
                    <small class="text-muted d-block fw-semibold text-uppercase" style="font-size: 0.7rem;">Guru
                        pembina</small>
                    <span class="fw-semibold text-dark"><?php echo e($ekskul->pembina); ?></span>
                </div>
            </div>

            <div class="text-secondary body-text detail-desc-body" style="line-height: 1.85; font-size: 1.05rem;">
                <?php echo $ekskul->deskripsi_ekstrakulikuler; ?>

            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ekskul->photos && $ekskul->photos->count() > 0): ?>
                <div class="galeri-section mt-5 pt-5 border-top border-light">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Dokumentasi — <?php echo e($ekskul->nama_ekskul); ?></h2>
                    <div id="ekskulGallery" class="carousel slide rounded-3 overflow-hidden border border-light shadow-sm"
                        data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ekskul->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" data-bs-interval="4000">

                                    
                                    <div class="position-relative d-flex align-items-center justify-content-center bg-dark"
                                        style="height: 500px;">

                                        
                                        <img src="<?php echo e(asset('storage/' . $photo->foto)); ?>"
                                            class="d-block mh-100 mw-100 position-relative"
                                            style="object-fit: contain; z-index: 2;"
                                            alt="<?php echo e($photo->caption ?? 'Dokumentasi ' . $ekskul->nama_ekskul); ?>">

                                        
                                        <div class="position-absolute top-0 start-0 w-100 h-100"
                                            style="background: url('<?php echo e(asset('storage/' . $photo->foto)); ?>') center/cover no-repeat; filter: blur(20px) brightness(0.6); z-index: 1;">
                                        </div>

                                        
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo->caption): ?>
                                            <div class="carousel-caption d-block" style="z-index: 3;">
                                                <div
                                                    class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill border border-light border-opacity-25">
                                                    <p class="mb-0 text-white small"><?php echo e($photo->caption); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ekskul->photos->count() > 1): ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#ekskulGallery"
                                data-bs-slide="prev" aria-label="Sebelumnya">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-50"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#ekskulGallery"
                                data-bs-slide="next" aria-label="Berikutnya">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-50"></span>
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="mt-5 pt-4 text-start">
                <a href="<?php echo e(route('ekstrakulikuler.index')); ?>" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar ekskul
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/ekstrakulikuler/detail.blade.php ENDPATH**/ ?>
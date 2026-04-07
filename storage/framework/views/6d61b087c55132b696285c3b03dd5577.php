<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="<?php echo e(asset('storage/' . $prestasi->thumbnail)); ?>" class="detail-thumb-bg__img"
                    alt="<?php echo e($prestasi->judul); ?>">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start"
                style="z-index: 2;">
                <h1 class="text-white fw-bold display-6 mb-0"><?php echo e($prestasi->judul); ?></h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container text-start">
            <div
                class="d-flex align-items-center flex-wrap gap-2 gap-md-3 mb-4 pb-3 border-bottom border-light text-muted small">
                <div class="d-flex flex-wrap align-items-center gap-3" style="font-size: 0.9rem;">
                    
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-calendar-check me-2 text-success"></i>
                        <span>Dipublikasikan:
                            <?php echo e(\Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y')); ?></span>
                    </span>

                    <span class="d-none d-md-inline text-muted">·</span>

                    
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-tag me-2 text-success"></i>
                        <span>Jenis: <?php echo e($prestasi->kategori_prestasi); ?></span>
                    </span>

                    <span class="d-none d-md-inline text-muted">·</span>

                    
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-trophy me-2 text-success"></i>
                        <span>Tingkat: <?php echo e($prestasi->tingkat); ?></span>
                    </span>
                </div>
            </div>

            <div class="body-text mb-5 detail-desc-body" style="line-height: 1.8; color: #475569; font-size: 1.05rem;">
                <?php echo $prestasi->konten; ?>

            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prestasi->photos && $prestasi->photos->count() > 0): ?>
                <div class="mt-5 pt-4 border-top border-light">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — <?php echo e($prestasi->judul); ?></h2>
                    <div id="prestasiGallery" class="carousel slide rounded-3 border border-light overflow-hidden mb-4"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $prestasi->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>" data-bs-interval="4000">
                                    <img src="<?php echo e(asset('storage/' . $photo->foto)); ?>" class="d-block w-100 object-fit-cover"
                                        style="height: 480px;" alt="Galeri">

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo->caption): ?>
                                        <div class="carousel-caption d-block">
                                            <div class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                <p class="mb-0 text-white small"><?php echo e($photo->caption); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prestasi->photos->count() > 1): ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="prev" aria-label="Sebelumnya">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="next" aria-label="Berikutnya">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="mt-5 text-start">
                <a href="<?php echo e(route('prestasi.index')); ?>" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar prestasi
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/prestasi/detail.blade.php ENDPATH**/ ?>
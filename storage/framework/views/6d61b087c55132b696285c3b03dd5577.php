<?php $__env->startSection('content'); ?>
    <section class="bg-white">
        <div class="container-fluid p-0">
            <div class="detail-hero-16x9">
                <img src="<?php echo e(asset('storage/' . $prestasi->thumbnail)); ?>" class="detail-hero-16x9__img"
                    alt="<?php echo e($prestasi->judul); ?>">
                <div class="position-absolute top-0 start-0 w-100 h-100 detail-hero-shade"></div>
                <div class="position-absolute bottom-0 start-0 w-100 p-4 p-md-5 text-white detail-hero-title-wrap">
                    <div class="container-fluid px-3 px-md-4 px-xl-5">
                        <h1 class="detail-hero-title mb-0 text-white"><?php echo e($prestasi->judul); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-body py-5 pb-5 mb-4">
        <div class="container-fluid px-3 px-md-4 px-xl-5">
            <div class="detail-meta text-start">
                <span class="detail-meta__item">
                    <i class="bi bi-calendar-check text-success" aria-hidden="true"></i>
                    <span class="detail-meta__label">Posting</span>
                    <span><?php echo e(\Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y')); ?></span>
                </span>
                <span class="detail-meta__item">
                    <i class="bi bi-tag-fill text-success" aria-hidden="true"></i>
                    <span class="detail-meta__label">Kategori</span>
                    <span><?php echo e($prestasi->kategori_prestasi); ?></span>
                </span>
                <span class="detail-meta__item">
                    <i class="bi bi-trophy-fill text-success" aria-hidden="true"></i>
                    <span class="detail-meta__label">Tingkat</span>
                    <span><?php echo e($prestasi->tingkat); ?></span>
                </span>
            </div>

            <div class="body-text detail-prose text-start mb-5">
                <?php echo $prestasi->konten; ?>

            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prestasi->photos && $prestasi->photos->count() > 0): ?>
                <div class="detail-gallery">
                    <h2 class="detail-gallery__title text-start mb-4">Galeri — <?php echo e($prestasi->judul); ?></h2>
                    <div id="prestasiGallery" class="carousel slide detail-carousel mb-1" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $prestasi->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>" data-bs-interval="4000">
                                    <img src="<?php echo e(asset('storage/' . $photo->foto)); ?>" class="d-block detail-carousel-img" alt="Galeri">

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
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery" data-bs-slide="prev" aria-label="Sebelumnya">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery" data-bs-slide="next" aria-label="Berikutnya">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="detail-back text-start">
                <a href="<?php echo e(route('prestasi.index')); ?>" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Kembali ke daftar prestasi
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/prestasi/detail.blade.php ENDPATH**/ ?>
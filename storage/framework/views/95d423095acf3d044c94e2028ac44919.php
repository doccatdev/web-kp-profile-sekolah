<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>" class="detail-thumb-bg__img"
                    alt="<?php echo e($program->nama_program); ?>">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start"
                style="z-index: 2;">
                <h1 class="fw-bold text-white display-5 mb-0" data-aos="fade-up"><?php echo e($program->nama_program); ?></h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container text-start">
            <div class="article-content text-dark mb-5 detail-desc-body" style="line-height: 1.85;">
                <?php echo $program->deskripsi_program; ?>

            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->galleries->count() > 0): ?>
                <div class="gallery-section mt-5">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — <?php echo e($program->nama_program); ?></h2>

                    <div id="programGallery" class="carousel slide overflow-hidden rounded-3 border border-light shadow-sm"
                        data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" data-bs-interval="3500">

                                    
                                    <div class="position-relative d-flex align-items-center justify-content-center bg-dark"
                                        style="height: 500px;">

                                        
                                        <img src="<?php echo e(asset('storage/' . $galeri->image)); ?>"
                                            class="d-block mh-100 mw-100 position-relative"
                                            style="object-fit: contain; z-index: 2;"
                                            alt="<?php echo e($galeri->caption ?? 'Galeri ' . $program->nama_program); ?>">

                                        
                                        <div class="position-absolute top-0 start-0 w-100 h-100"
                                            style="background: url('<?php echo e(asset('storage/' . $galeri->image)); ?>') center/cover no-repeat; filter: blur(20px) brightness(0.6); z-index: 1;">
                                        </div>

                                        
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($galeri->caption): ?>
                                            <div class="carousel-caption d-block" style="z-index: 3;">
                                                <div
                                                    class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill border border-light border-opacity-25">
                                                    <p class="mb-0 text-white" style="font-size: 0.9rem;">
                                                        <?php echo e($galeri->caption); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#programGallery"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#programGallery"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="mt-5 pt-2 text-start">
                <a href="<?php echo e(url('/program-unggulan')); ?>" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar program unggulan
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/program-unggulan/detail.blade.php ENDPATH**/ ?>
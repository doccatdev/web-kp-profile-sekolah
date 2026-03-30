<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative; background-color: #000;">
            
            <div class="position-absolute w-100 h-50 bottom-0 start-0"
                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); z-index: 1;"></div>

            
            <img src="<?php echo e(asset('storage/' . $prestasi->thumbnail)); ?>"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="<?php echo e($prestasi->judul); ?>">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <h1 class="text-white fw-bold display-5 mb-0"><?php echo e($prestasi->judul); ?></h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    
                    
                    <div class="d-flex align-items-center flex-wrap mb-4 text-secondary gap-3">
                        
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-check me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Posting:</span>
                            <span><?php echo e(\Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y')); ?></span>
                        </div>
                        
                        
                        <div class="d-flex align-items-center border-start ps-3 ms-1">
                            <i class="bi bi-tag-fill me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Kategori:</span>
                            <span><?php echo e($prestasi->kategori_prestasi); ?></span>
                        </div>

                        
                        <div class="d-flex align-items-center border-start ps-3 ms-1">
                            <i class="bi bi-trophy-fill me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Tingkat:</span>
                            <span><?php echo e($prestasi->tingkat); ?></span>
                        </div>
                    </div>

                    
                    <div class="body-text mb-5" style="line-height: 1.8; color: #444; font-size: 1.1rem; text-align: justify;">
                        <?php echo $prestasi->konten; ?>

                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prestasi->photos && $prestasi->photos->count() > 0): ?>
                    <div class="mt-5 pt-4 border-top">
                        <h5 class="fw-bold text-dark mb-4"><i class="bi bi-images me-2 text-success"></i>Foto-Foto Prestasi <?php echo e($prestasi->judul); ?></h5>
                        <div id="prestasiGallery" class="carousel slide rounded-4 shadow-sm overflow-hidden mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $prestasi->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>" data-bs-interval="4000">
                                    <img src="<?php echo e(asset('storage/' . $photo->foto)); ?>" class="d-block w-100 object-fit-cover" style="height: 480px;" alt="Galeri">
                                    
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
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="text-center mt-5">
                        <a href="<?php echo e(route('prestasi.index')); ?>" class="btn btn-outline-success rounded-pill px-5 py-2 fw-bold">
                            <i class="bi bi-arrow-left me-2"></i>Kembali Ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/prestasi/detail.blade.php ENDPATH**/ ?>
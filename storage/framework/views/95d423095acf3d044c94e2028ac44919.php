<?php $__env->startSection('content'); ?>
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>" class="detail-thumb-bg__img"
                    alt="<?php echo e($program->nama_program); ?>">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <h1 class="fw-bold text-white display-4 mb-0" data-aos="fade-up"><?php echo e($program->nama_program); ?></h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="article-content text-dark mb-5">
                        <?php echo $program->deskripsi_program; ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->galleries->count() > 0): ?>
                        <div class="gallery-section mt-5">
                            <h4 class="fw-bold text-dark mb-4 d-flex align-items-center">
                                <span class="bg-success rounded-2 me-2" style="width: 12px; height: 24px;"></span>
                                Foto-Foto Kegiatan <?php echo e($program->nama_program); ?>

                            </h4>

                            <div id="programGallery" class="carousel slide overflow-hidden shadow-sm rounded-4"
                                data-bs-ride="carousel">
                                
                                

                                <div class="carousel-inner">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" data-bs-interval="3500">
                                            <img src="<?php echo e(asset('storage/' . $galeri->image)); ?>"
                                                class="d-block w-100 object-fit-cover" style="height: 500px;"
                                                alt="<?php echo e($galeri->caption ?? 'Galeri ' . $program->nama_program); ?>">
                                            
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($galeri->caption): ?>
                                                
                                                <div class="carousel-caption d-block">
                                                    <div class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                        <p class="mb-0 text-white" style="font-size: 0.9rem;"><?php echo e($galeri->caption); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                
                                <button class="carousel-control-prev" type="button" data-bs-target="#programGallery" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#programGallery" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="mt-5 pt-3">
                        <a href="<?php echo e(url('/program-unggulan')); ?>" class="btn btn-outline-success rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Program Unggulan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/program-unggulan/detail.blade.php ENDPATH**/ ?>
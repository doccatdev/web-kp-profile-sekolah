<?php $__env->startSection('content'); ?>
    <section style="margin-top: 76px; background: #ffffff;">
        <div class="container-fluid p-0">
            <div class="card border-0 shadow-none">
                <div class="position-relative">
                    
                    <img src="<?php echo e(asset('storage/' . $item->thumbnail)); ?>" class="w-100 object-fit-cover" style="height: 500px;"
                        alt="<?php echo e($item->nama_fasilitas); ?>">

                    <div class="position-absolute bottom-0 start-0 w-100 h-50"
                        style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"></div>
                    <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white w-100">
                        <div class="container">
                            <h1 class="fw-bold display-4 mb-0"><?php echo e($item->nama_fasilitas); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="container py-5">
                    <div class="description-content text-muted mb-5" style="line-height: 2; font-size: 1.15rem;">
                        <?php echo $item->deskripsi_fasilitas; ?>

                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->galeri->count() > 0): ?>
                        <div class="gallery-section mt-5 pt-5 border-top">
                            <h3 class="fw-bold text-dark mb-4 text-center">Foto-Foto Fasilitas <?php echo e($item->nama_fasilitas); ?>

                            </h3>
                            <div id="fasilitasGallery" class="carousel slide shadow-sm" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $item->galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                            <img src="<?php echo e(asset('storage/' . $g->image)); ?>"
                                                class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                alt="Gallery">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($g->caption): ?>
                                                <div class="carousel-caption d-block">
                                                    
                                                    <div
                                                        class="text-center d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                        <p class="m-0 text-white" style="font-size: 0.9rem;">
                                                            <?php echo e($g->caption); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="text-center mt-5">
                        <a href="<?php echo e(route('fasilitas.index')); ?>" class="btn btn-outline-success rounded-pill px-5">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Fasilitas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/fasilitas/detail.blade.php ENDPATH**/ ?>
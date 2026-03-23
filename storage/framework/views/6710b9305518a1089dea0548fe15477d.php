<?php $__env->startSection('content'); ?>
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Pengembangan Bakat</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Ekstrakurikuler</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Wadah pengembangan bakat, minat, dan potensi siswa SMP Al-Husainiyyah di luar jam pelajaran.
            </p>
        </div>
    </section>

    <section id="ekstrakulikuler-page" class="py-5 bg-light">
        <div class="container py-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($extracurriculars) && $extracurriculars->count() > 0): ?>
                <div class="row g-4 justify-content-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $extracurriculars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                            <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
                                <div class="position-relative">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ekskul->thumbnail): ?>
                                        <img src="<?php echo e(asset('storage/' . $ekskul->thumbnail)); ?>"
                                            class="card-img-top object-fit-cover" alt="<?php echo e($ekskul->nama_ekskul); ?>"
                                            style="height: 220px;">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/activity-03.jpg')); ?>"
                                            class="card-img-top object-fit-cover" alt="<?php echo e($ekskul->nama_ekskul); ?>"
                                            style="height: 220px;">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center me-3"
                                             style="width: 40px; height: 40px; flex-shrink: 0;">
                                            <i class="bi <?php echo e($ekskul->icon_class ?? 'bi-star-fill'); ?> fs-5"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0 text-dark"><?php echo e($ekskul->nama_ekskul); ?></h5>
                                    </div>

                                    <p class="small text-muted mb-4 flex-grow-1">
                                        <?php echo e($ekskul->deskripsi_singkat ?? Str::limit(strip_tags($ekskul->deskripsi_ekstrakulikuler), 100)); ?>

                                    </p>

                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <small class="text-secondary">
                                            <i class="bi bi-person-check me-1"></i><?php echo e($ekskul->pembina); ?>

                                        </small>
                                        <a href="<?php echo e(route('ekstrakulikuler.detail', $ekskul->slug)); ?>"
                                            class="btn btn-outline-success btn-sm rounded-pill px-4">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="row justify-content-center py-5">
                    <div class="col-lg-8 text-center">
                        <div class="bg-white p-5 rounded-4 shadow-sm">
                            <i class="bi bi-trophy text-muted display-1 mb-3"></i>
                            <h4 class="fw-bold">Belum Ada Data</h4>
                            <p class="text-muted">Data ekstrakurikuler akan segera diperbarui oleh admin.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/ekstrakulikuler/index.blade.php ENDPATH**/ ?>
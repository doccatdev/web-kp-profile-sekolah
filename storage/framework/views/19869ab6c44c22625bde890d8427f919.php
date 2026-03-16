<?php $__env->startSection('content'); ?>
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kurikulum & Kegiatan</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Program Unggulan</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Program komprehensif SMP Al-Husainiyyah yang dirancang khusus untuk memaksimalkan potensi akademik, karakter
                islami, dan keterampilan siswa.
            </p>
        </div>
    </section>

    <!-- Program Grid Section -->
    <section id="program-unggulan-list" class="py-5 bg-light">
        <div class="container pb-5">
            <div class="row g-4 justify-content-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($flagshipPrograms) && $flagshipPrograms->count() > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $flagshipPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                            <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                                <img src="<?php echo e($program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg')); ?>"
                                    class="card-img-top object-fit-cover" style="height: 220px;"
                                    alt="<?php echo e($program->title); ?>">
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex"><i
                                                class="bi bi-star-fill fs-5"></i></div>
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">Program
                                            Unggulan</span>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-dark"><?php echo e($program->title); ?></h5>
                                    <p class="small text-muted mb-4 flex-grow-1">
                                        <?php echo e(Str::limit(strip_tags($program->description), 100)); ?>

                                    </p>
                                    <a href="<?php echo e(url('/program-unggulan/' . $program->id)); ?>"
                                        class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">Read More
                                        <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php else: ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 6; $i++): ?>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo e($i * 100); ?>">
                            <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                                <img src="<?php echo e(asset('assets/images/activity-0' . ($i > 3 ? 1 : $i) . '.jpg')); ?>"
                                    class="card-img-top object-fit-cover" style="height: 220px;"
                                    alt="Program Unggulan <?php echo e($i); ?>">
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex"><i
                                                class="bi bi-star-fill fs-5"></i></div>
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">Program
                                            Unggulan</span>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-dark">Program Unggulan <?php echo e($i); ?></h5>
                                    <p class="small text-muted mb-4 flex-grow-1">Deskripsi singkat mengenai program unggulan
                                        ini yang
                                        dirancang untuk mencetak generasi cerdas dan religious.</p>
                                    <a href="<?php echo e(url('/program-unggulan/program-dummy-' . $i)); ?>"
                                        class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">Read More
                                        <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/program-unggulan/index.blade.php ENDPATH**/ ?>
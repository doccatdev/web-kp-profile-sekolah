<?php $__env->startSection('content'); ?>
    <?php
        if (!isset($ekskul) && !isset($extracurriculars)) {
            $extracurriculars = collect([
                (object) [
                    'id' => 'pencak-silat',
                    'title' => 'Pencak Silat',
                    'image' => null,
                    'description' => 'Seni bela diri tradisional Indonesia untuk melatih fisik dan mental siswa.',
                ],
                (object) [
                    'id' => 'futsal',
                    'title' => 'Futsal',
                    'image' => null,
                    'description' => 'Olahraga beregu yang melatih kerja sama tim dan sportivitas.',
                ],
                (object) [
                    'id' => 'pramuka',
                    'title' => 'Pramuka',
                    'image' => null,
                    'description' => 'Membentuk karakter disiplin, mandiri, dan cinta alam.',
                ],
            ]);
        } elseif (isset($ekskul) && !isset($extracurriculars)) {
            $extracurriculars = $ekskul; // handle old variable name gracefully
        }
    ?>
    <!-- Page Header CSS Gradient Version for Performance -->
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

    <!-- Content Section -->
    <section id="ekstrakulikuler-page" class="py-5 bg-light">
        <div class="container py-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($extracurriculars) && $extracurriculars->count() > 0): ?>
                <div class="row g-4 justify-content-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $extracurriculars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                            <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ekskul->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $ekskul->image)); ?>"
                                        class="card-img-top object-fit-cover" alt="<?php echo e($ekskul->title); ?>"
                                        style="height: 220px;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/activity-03.jpg')); ?>"
                                        class="card-img-top object-fit-cover" alt="<?php echo e($ekskul->title); ?>"
                                        style="height: 220px;">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex"><i
                                                class="bi bi-star-fill fs-5"></i></div>
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">Giat
                                            Ekskul</span>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-dark"><?php echo e($ekskul->title); ?></h5>
                                    <p class="small text-muted mb-4 flex-grow-1">
                                        <?php echo Str::limit(strip_tags($ekskul->description), 100); ?>

                                    </p>
                                    <a href="<?php echo e(route('ekstrakulikuler.detail', ['id' => $ekskul->id])); ?>"
                                        class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">Read More
                                        <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                            <div class="card-body py-5 text-muted">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-trophy-fill fs-1"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-3">Tunggu Tanggal Mainnya!</h4>
                                <p class="mb-0 mx-auto" style="max-width: 500px;">Data ekstrakurikuler akan segera
                                    ditampilkan di sini setelah diperbarui oleh administrator sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/ekstrakulikuler/index.blade.php ENDPATH**/ ?>
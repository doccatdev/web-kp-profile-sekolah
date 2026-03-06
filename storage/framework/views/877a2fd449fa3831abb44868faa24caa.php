<?php $__env->startSection('content'); ?>

    <?php

        // Provide fallback empty data if the controller does not pass $prestasi yet

        if (!isset($prestasi)) {
            $prestasi = collect([
                (object) [
                    'id' => 1,

                    'title' => 'Juara 1 Lomba Pidato Bahasa Arab Nasional',

                    'category' => 'Bahasa',

                    'image' => null,

                    'description' =>
                        'Siswa kami berhasil mengharumkan nama sekolah dengan meraih Juara 1 pada ajang kompetisi bergengsi tingkat nasional.',
                ],

                (object) [
                    'id' => 2,

                    'title' => 'Medali Emas Olimpiade Sains (OSN) Matematika',

                    'category' => 'Akademik',

                    'image' => null,

                    'description' =>
                        'Prestasi membanggakan dari ananda dalam memecahkan soal-soal matematika tingkat tinggi di ajang Olimpiade Sains Provinsi.',
                ],

                (object) [
                    'id' => 3,

                    'title' => 'Juara Umum Turnamen Pencak Silat Pelajar',

                    'category' => 'Olahraga',

                    'image' => null,

                    'description' =>
                        'Tim pencak silat sekolah membuktikan ketangguhannya dengan meraih gelar Juara Umum di turnamen bela diri antar pelajar.',
                ],
            ]);
        }
    ?>

    <!-- Page Header CSS Gradient Version for Performance -->

    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">

        <div class="container py-5 text-center">

            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kebanggaan Sekolah</span>

            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Prestasi</h1>

            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">

                Pencapaian gemilang siswa dan siswi SMP Al-Husainiyyah di berbagai bidang akademik maupun non-akademik.

            </p>

        </div>

    </section>



    <!-- Content Section -->

    <section id="prestasi-page" class="py-5 bg-light">

        <div class="container py-4">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($prestasi) && $prestasi->count() > 0): ?>
                <div class="row g-4 justify-content-center">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">

                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100">

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->image)); ?>" class="w-100 object-fit-cover"
                                        alt="<?php echo e($item->title); ?>" style="height: 280px;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/activity-01.jpg')); ?>" class="w-100 object-fit-cover"
                                        alt="<?php echo e($item->title); ?>" style="height: 280px;">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <div class="ig-overlay"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 100%);">

                                </div>

                                <div class="position-absolute bottom-0 start-0 p-4 text-white w-100" style="z-index:2;">

                                    <div class="d-flex align-items-center gap-2 mb-2">

                                        <div
                                            class="bg-warning text-dark px-2 py-1 rounded-2 small fw-bold d-inline-flex align-items-center">

                                            <i class="bi bi-trophy-fill me-1"></i> Juara

                                        </div>

                                        <span
                                            class="badge bg-white bg-opacity-25 rounded-pill small"><?php echo e($item->category ?? 'Prestasi'); ?></span>

                                    </div>

                                    <h5 class="fw-bold mb-2"><?php echo e($item->title); ?></h5>

                                    <a href="<?php echo e(route('prestasi.detail', ['id' => Str::slug($item->title ?? 'detail')])); ?>"
                                        class="btn btn-outline-light btn-sm rounded-pill px-4 mt-2">Lihat Galeri <i
                                            class="bi bi-arrow-right ms-1"></i></a>

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

                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                    style="width: 80px; height: 80px;">

                                    <i class="bi bi-award-fill fs-1"></i>

                                </div>

                                <h4 class="fw-bold text-dark mb-3">Prestasi Akan Segera Tampil</h4>

                                <p class="mb-0 mx-auto" style="max-width: 500px;">Data prestasi luar biasa dari siswa-siswi

                                    kami akan segera ditambahkan di sini oleh administrator sekolah.</p>

                            </div>

                        </div>

                    </div>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/prestasi/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold shadow-sm">Pendidik
                Profesional</span>
            <h1 class="display-4 fw-bold">Data Guru</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;">Guru profesional dan berdedikasi tinggi yang siap membimbing siswa meraih prestasi gemilang</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="card-guru-alt shadow-sm">
                            <div class="card-header-bg"></div>
                            <div class="card-body">
                                <div class="avatar-wrapper">
                                    <img src="<?php echo e($item->foto ? asset('storage/' . $item->foto) : asset('assets/images/default-avatar.jpg')); ?>"
                                        class="avatar-img" alt="<?php echo e($item->nama); ?>" loading="lazy">
                                </div>

                                <h6 class="guru-name text-dark"><?php echo e($item->nama); ?></h6>

                                <div class="role-container">
                                    <div class="role-text">
                                        
                                        <?php echo e($item->jabatan); ?>


                                        <?php
                                            // Cek validitas Mapel
                                            $mapel = trim($item->mata_pelajaran);
                                            $isMapelValid = !empty($mapel) && strtolower($mapel) !== 'null';
                                        ?>

                                        
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isMapelValid): ?>
                                            <br> <?php echo e($mapel); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>

                                <a href="<?php echo e(route('profil.data-guru.detail', $item->slug)); ?>" class="btn-lihat">
                                    Lihat Profil <i class="bi bi-chevron-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Data belum tersedia.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/pengajar/data-guru.blade.php ENDPATH**/ ?>
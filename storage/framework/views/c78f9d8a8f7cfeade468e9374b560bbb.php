<?php $__env->startSection('content'); ?>
<section class="py-5 bg-white" style="margin-top: 100px; min-height: 80vh;">
    <div class="container py-5">
        <div class="row align-items-start g-5">
            
            
            <div class="col-md-4 text-center text-md-start">
                <img src="<?php echo e($data->foto ? asset('storage/' . $data->foto) : asset('assets/images/default-avatar.jpg')); ?>" 
                     class="img-fluid shadow-sm" 
                     style="width: 100%; max-width: 350px; height: auto; border-radius: 4px;" 
                     alt="<?php echo e($data->nama); ?>">
            </div>

            
            <div class="col-md-8">
                <div class="detail-info">
                    
                    <h1 class="fw-bold mb-4 text-dark" style="font-size: 2.5rem;"><?php echo e($data->nama); ?></h1>
                    
                    
                    <div class="mb-3">
                        <label class="fw-bold d-block text-dark small text-uppercase">Jabatan</label>
                        <p class="text-muted fs-5"><?php echo e($data->jabatan); ?></p>
                    </div>

                    
                    <div class="mb-3">
                        <label class="fw-bold d-block text-dark small text-uppercase">Mata Pelajaran</label>
                        <p class="text-muted fs-5"><?php echo e($data->mata_pelajaran ?? '-'); ?></p>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data->deskripsi): ?>
                    <div class="mb-4">
                        <label class="fw-bold d-block text-dark small text-uppercase">Tentang Pendidik</label>
                        <div class="text-muted lh-lg">
                            <?php echo $data->deskripsi; ?>

                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="mt-5">
                        <a href="<?php echo e(route('profil.data-guru.index')); ?>" 
                           class="btn text-white px-4 py-2 shadow-sm" 
                           style="background-color: #50C878; border-color: #50C878;">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/pengajar/detail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Tentang Kami</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Sejarah Sekolah</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Langkah awal dan perjalanan panjang berdirinya SMP Al Husainiyah.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section" data-aos="fade-up">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($sejarah) && $sejarah->sejarah_singkat): ?>
                    <div class="row justify-content-center">
                        
                        <div class="col-lg-10">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                        <i class="bi bi-clock-history fs-3"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0 text-dark">Sejarah Singkat</h3>
                                </div>
                                <div class="body-text" style="line-height: 1.8; color: #4b5563; text-align: justify;">
                                    <?php echo $sejarah->sejarah_singkat; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row justify-content-center text-center py-5 text-muted">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm rounded-4 p-5">
                                <p class="mb-0">Data sejarah belum tersedia.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/profil/sejarah.blade.php ENDPATH**/ ?>
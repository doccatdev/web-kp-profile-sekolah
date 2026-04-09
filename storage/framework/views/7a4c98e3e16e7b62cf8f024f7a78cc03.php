<?php $__env->startSection('content'); ?>
    <section id="kontak" class="pt-5">
        <div class="container py-5">
            <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
                <div class="container py-5 text-center">
                    <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                        data-aos="fade-down">Pusat Layanan</span>
                    <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Hubungi Kami</h1>
                    <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up"
                        data-aos-delay="200">
                        Silakan hubungi kami melalui informasi di bawah ini atau kunjungi langsung lokasi sekolah kami.
                    </p>
                </div>
            </section>

            <section class="py-5 bg-light">
                <div class="container py-5">

                    
                    <div class="row g-4 mb-5" data-aos="fade-up">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kontak): ?>
                            
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                                    <div class="d-flex align-items-start">
                                        <div class="icon-box" style="color: #009b4d;">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <small class="text-muted d-block small">Alamat</small>
                                            <span class="text-dark fw-medium"><?php echo e($kontak->address); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box" style="color: #009b4d;">
                                            <i class="bi bi-envelope-at-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <small class="text-muted d-block small">Email</small>
                                            <a href="mailto:<?php echo e($kontak->email); ?>"
                                                class="fw-medium text-dark text-decoration-none d-block">
                                                <?php echo e($kontak->email); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box" style="color: #009b4d;">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <small class="text-muted d-block small">Telepon</small>
                                            <a href="tel:<?php echo e(preg_replace('/\s+/', '', $kontak->phone)); ?>"
                                                class="fw-medium text-dark text-decoration-none d-block">
                                                <?php echo e($kontak->phone); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-12 text-center text-muted">
                                <p>Data kontak belum tersedia di database.</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                                
                                <iframe width="100%" height="450" frameborder="0" style="border:0;"
                                    src="https://maps.google.com/maps?q=SMP+Al+Husainiyah&t=&z=13&ie=UTF8&iwloc=&output=embed-6.879968068718357,107.60669701786556&z=17&output=embed"
                                    allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 15px;">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold text-dark">Kirim Pesan</h3>
                                    <p class="text-muted small">Punya pertanyaan? Silakan kirim pesan melalui formulir di
                                        bawah ini.</p>
                                </div>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                                    <div class="alert alert-success border-0 shadow-sm mb-4">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <form action="<?php echo e(route('contact.send')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control bg-light border-0 p-3"
                                                placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="form-control bg-light border-0 p-3"
                                                placeholder="Alamat Email" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="subject" class="form-control bg-light border-0 p-3"
                                                placeholder="Subjek Pesan" required>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control bg-light border-0 p-3" rows="5" placeholder="Tuliskan pesan Anda..."
                                                required></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success rounded-pill px-5 py-3 shadow-sm">
                                                <i class="bi bi-send-fill me-2"></i> Kirim Pesan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/kontak/kontak.blade.php ENDPATH**/ ?>
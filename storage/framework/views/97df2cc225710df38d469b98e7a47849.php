<?php $__env->startSection('content'); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ppdb): ?>
        <section id="ppdb" class="min-vh-100 py-5">
            <div class="container">

                <!-- Page Header CSS Gradient Version for Performance -->
                <section class="py-5 text-white pt-5 mb-5"
                    style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
                    <div class="container py-5 text-center">
                        <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                            data-aos="fade-down">Penerimaan Siswa Baru</span>
                        <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">PPDB TA
                            <?php echo e($ppdb->tahun_ajaran); ?></h1>
                        <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up"
                            data-aos-delay="200">
                            Informasi lengkap syarat pendaftaran, biaya, dan brosur Penerimaan Peserta Didik Baru SMP
                            Al-Husainiyyah.
                        </p>
                    </div>
                </section>

                <ul class="nav nav-ppdb-custom justify-content-center mb-5" id="ppdbTab" role="tablist"
                    data-aos="fade-up">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#syarat" type="button">
                            Syarat Pendaftaran
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#biaya" type="button">
                            Biaya Pendidikan
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#brosur" type="button">
                            Brosur
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kontak" type="button">
                            Kontak
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="ppdbTabContent" data-aos="fade-up">

                    
                    <div class="tab-pane fade show active" id="syarat" role="tabpanel">
                        <div class="prose-content mx-auto" style="max-width: 900px;">
                            <h3 class="text-center mb-4">Dokumen & Persyaratan</h3>
                            <div class="bg-white p-4 p-md-5 border-0 shadow-sm rounded-4">
                                <?php echo $ppdb->persyaratan; ?>

                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="biaya" role="tabpanel">
                        <div class="prose-content mx-auto" style="max-width: 900px;">
                            <h3 class="text-center mb-4">Rincian Biaya</h3>
                            <div class="bg-white p-4 p-md-5 border-0 shadow-sm rounded-4">
                                <?php echo $ppdb->rincian_biaya; ?>

                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="brosur" role="tabpanel">
                        <div class="text-center">
                            <h3 class="mb-4">Brosur Resmi PPDB</h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ppdb->gambar_brosur): ?>
                                <div class="mb-4 mx-auto" style="max-width: 700px;">
                                    <img src="<?php echo e(asset('storage/' . $ppdb->gambar_brosur)); ?>"
                                        class="img-fluid rounded-4 shadow-sm border" alt="Brosur Lengkap">
                                </div>
                                <a href="<?php echo e(asset('storage/' . $ppdb->gambar_brosur)); ?>" download
                                    class="btn btn-dark rounded-pill px-5 py-2">
                                    <i class="bi bi-download me-2"></i>Unduh Brosur
                                </a>
                            <?php else: ?>
                                <p class="text-muted">File brosur belum tersedia.</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="kontak" role="tabpanel">
                        <div class="text-center py-5">
                            <h3 class="mb-3">Butuh Bantuan Pendaftaran?</h3>
                            <p class="text-muted mb-5">Silahkan hubungi panitia PPDB kami melalui WhatsApp:</p>

                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($ppdb->contacts) && $ppdb->contacts->count() > 0): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ppdb->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $contact->nomor_whatsapp)); ?>"
                                            target="_blank"
                                            class="btn btn-success btn-lg rounded-pill px-4 py-3 shadow-sm fw-bold">
                                            <i class="bi bi-whatsapp me-2"></i><?php echo e($contact->nama_kontak); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $ppdb->kontak_whatsapp)); ?>"
                                        target="_blank"
                                        class="btn btn-success btn-lg rounded-pill px-4 py-3 shadow-sm fw-bold">
                                        <i class="bi bi-whatsapp me-2"></i>Hubungi Panitia
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php else: ?>
        
        <section class="py-5 min-vh-100 d-flex align-items-center bg-white text-center">
            <div class="container">
                <div class="mb-4 text-muted"><i class="bi bi-calendar-x" style="font-size: 4rem;"></i></div>
                <h2 class="fw-bold text-dark">Pendaftaran Belum Dibuka</h2>
                <p class="text-muted">Mohon maaf, informasi pendaftaran tahun ajaran baru belum tersedia saat ini.</p>
                <a href="/" class="btn btn-outline-dark rounded-pill px-4 mt-3">Kembali ke Beranda</a>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/ppdb/index.blade.php ENDPATH**/ ?>
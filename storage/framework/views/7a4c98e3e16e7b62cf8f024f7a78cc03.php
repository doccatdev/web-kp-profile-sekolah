<?php $__env->startSection('content'); ?>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <section id="kontak" class="pt-5">
        <div class="container py-5">
            <!-- Page Header CSS Gradient Version for Performance -->
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
                                        <div class="icon-box">
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
                                        <div class="icon-box">
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
                                        <div class="icon-box">
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
                            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 0;">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 0;">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold text-dark">Kirim Pesan</h3>
                                    <div class="stripe-red mx-auto"></div>
                                    <p class="text-muted small">Punya pertanyaan atau butuh informasi lebih lanjut? Silakan
                                        kirim pesan kepada kami melalui formulir di bawah ini.</p>
                                </div>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4"
                                        role="alert">
                                        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4"
                                        role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo e(session('error')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <form action="<?php echo e(route('contact.send')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row g-3">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                                                <input type="text" name="name"
                                                    class="form-control bg-light border-0 p-3 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('name')); ?>" placeholder="Masukkan nama Anda" required>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback small"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label small fw-bold text-muted">Alamat Email</label>
                                                <input type="email" name="email"
                                                    class="form-control bg-light border-0 p-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('email')); ?>" placeholder="email@contoh.com" required>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback small"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label small fw-bold text-muted">Subjek / Perihal</label>
                                                <input type="text" name="subject"
                                                    class="form-control bg-light border-0 p-3 <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('subject')); ?>" placeholder="Subjek pesan" required>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback small"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label small fw-bold text-muted">Pesan Anda</label>
                                                <textarea name="message" class="form-control bg-light border-0 p-3 <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required><?php echo e(old('message')); ?></textarea>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback small"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit"
                                                class="btn btn-emerald rounded-pill px-5 py-3 shadow-sm">
                                                <i class="bi bi-send-fill me-2"></i> Kirim Pesan Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Mengambil koordinat dari variabel $kontak yang dikirim controller
                            // Gunakan default value jika lat/lng tidak ditemukan di DB
                            <?php if($kontak && isset($kontak->location['lat']) && isset($kontak->location['lng'])): ?>
                                const lat = <?php echo e($kontak->location['lat']); ?>;
                                const lng = <?php echo e($kontak->location['lng']); ?>;
                            <?php else: ?>
                                // Fallback koordinat jika data di Filament belum diisi
                                const lat = -6.880105400263303;
                                const lng = 107.60658322895878;
                            <?php endif; ?>

                            // Inisialisasi Peta
                            const map = L.map('map').setView([lat, lng], 17);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);

                            // Tambahkan Marker
                            const marker = L.marker([lat, lng]).addTo(map);

                            // Popup Info Sekolah
                            marker.bindPopup(`
                <div style="text-align: center; padding: 5px;">
                    <strong style="color: #009b4d; font-size: 14px;">SMP Al Husainiyah</strong><br>
                    <span style="font-size: 11px; color: #666; line-height: 1.2; display: block; margin-top: 4px;">
                        <?php echo e($kontak->address ?? 'Alamat belum diatur'); ?>

                    </span>
                </div>
            `).openPopup();

                            // Fix agar map me-render dengan benar di dalam container bootstrap
                            setTimeout(() => {
                                map.invalidateSize();
                            }, 500);
                        });
                    </script>
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/kontak/kontak.blade.php ENDPATH**/ ?>
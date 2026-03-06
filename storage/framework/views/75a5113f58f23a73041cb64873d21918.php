<?php $__env->startSection('content'); ?>
    <?php
        if (!isset($pengumuman)) {
            $pengumuman = collect([
                (object) [
                    'id' => 'penerimaan-peserta-didik-baru',
                    'title' => 'Penerimaan Peserta Didik Baru (PPDB) Telah Dibuka',
                    'date' => '25 Mei 2024',
                    'excerpt' => 'Segera daftarkan putra/putri Anda sebelum kuota terpenuhi.',
                ],
                (object) [
                    'id' => 'libur-hari-raya',
                    'title' => 'Libur Nasional Hari Raya',
                    'date' => '10 April 2024',
                    'excerpt' => 'Pemberitahuan hari libur kegiatan belajar mengajar.',
                ],
                (object) [
                    'id' => 'kegiatan-class-meeting',
                    'title' => 'Rangkaian Kegiatan Class Meeting Semester Ganjil',
                    'date' => '15 Desember 2023',
                    'excerpt' => 'Informasi lomba dan kegiatan antar kelas setelah UTS.',
                ],
            ]);
        }
    ?>
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Pusat Informasi</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Agenda & Pengumuman</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Informasi jadwal kegiatan dan pengumuman penting untuk seluruh civitas akademika SMP Al-Husainiyyah.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section" data-aos="fade-up">
                <div class="row justify-content-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($pengumuman) && $pengumuman->count() > 0): ?>
                        <div class="row g-4 justify-content-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                                    <div class="card border-0 shadow-sm rounded-4 h-100 feature-card overflow-hidden">
                                        <div class="card-body p-4 d-flex flex-column">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 me-3">
                                                    <i class="bi bi-megaphone-fill fs-5"></i>
                                                </div>
                                                <span class="text-muted small fw-bold"><i
                                                        class="bi bi-calendar-event me-1"></i> <?php echo e($item->date); ?></span>
                                            </div>
                                            <h5 class="fw-bold mb-2"><?php echo e($item->title); ?></h5>
                                            <p class="text-muted small mb-4 flex-grow-1"><?php echo e($item->excerpt); ?></p>
                                            <div class="mt-auto">
                                                <a href="<?php echo e(route('pengumuman.detail', ['id' => $item->id])); ?>"
                                                    class="btn btn-outline-success btn-sm rounded-pill w-100">Baca
                                                    Pengumuman <i class="bi bi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card border-0 shadow-sm rounded-4 pt-3 pb-5">
                                    <div class="card-body p-5 text-center text-muted">
                                        <i class="bi bi-megaphone-fill fs-1 mb-3 d-block text-success"></i>
                                        <p class="mb-0">Agenda akan ditampilkan di sini setelah diisi melalui panel admin
                                            (Filament).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/pengumuman/index.blade.php ENDPATH**/ ?>
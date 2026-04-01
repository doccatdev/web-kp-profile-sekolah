<?php $__env->startSection('content'); ?>
    
    
    <section class="py-5 text-white" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kabar Sekolah</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Berita Terkini</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Informasi dan berita terbaru seputar kegiatan serta pencapaian SMP Al Husainiyyah.
            </p>
        </div>
    </section>

    
    
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-4">

                
                <div class="col-lg-8">
                    <div class="row">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-6 mb-4" data-aos="fade-up">
                                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden"
                                    style="transition: transform 0.3s ease;">
                                    
                                    <div class="position-relative">
                                        <img src="<?php echo e($item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png')); ?>"
                                            class="card-img-top object-fit-cover" style="height: 220px;"
                                            alt="<?php echo e($item->news_title); ?>">

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->category): ?>
                                            <span
                                                class="position-absolute top-0 start-0 m-3 badge bg-danger shadow-sm py-2 px-3 rounded-pill">
                                                <?php echo e($item->category->name_category); ?>

                                            </span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                    
                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="mb-2">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar3 me-1 text-success"></i>
                                                <?php echo e($item->posted_at->locale('id')->translatedFormat('d F Y')); ?>

                                            </small>
                                        </div>

                                        <h5 class="fw-bold mb-3">
                                            <a href="<?php echo e(route('berita.show', $item->slug)); ?>"
                                                class="text-decoration-none text-dark hover-success">
                                                <?php echo e(Str::limit($item->news_title, 60)); ?>

                                            </a>
                                        </h5>

                                        <p class="text-muted small mb-4 flex-grow-1">
                                            <?php echo e($item->excerpt ?? Str::limit(strip_tags($item->news_content), 110)); ?>

                                        </p>

                                        <div class="mt-auto">
                                            <a href="<?php echo e(route('berita.show', $item->slug)); ?>"
                                                class="text-decoration-none text-success fw-bold small text-uppercase d-inline-flex align-items-center">
                                                Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12 text-center py-5">
                                <div class="card border-0 shadow-sm p-5 rounded-4 bg-white">
                                    <i class="bi bi-newspaper fs-1 text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Belum ada berita yang diterbitkan saat ini.</p>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($news->hasPages()): ?>
                        <div class="d-flex justify-content-center mt-4">
                            <?php echo e($news->links()); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="col-lg-4">
                    
                    <div class="sticky-top" style="top: 100px; z-index: 5;">
                        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <i class="bi bi-grid-fill me-2 text-success"></i> Kategori Berita
                            </h5>

                            <div class="list-group list-group-flush">
                                
                                <a href="<?php echo e(route('berita.index')); ?>"
                                    class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center <?php echo e(!request('kategori') ? 'text-success fw-bold' : 'text-dark'); ?>">
                                    <span>Semua Berita</span>
                                    <i class="bi bi-chevron-right small"></i>
                                </a>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('berita.index', ['kategori' => $cat->slug])); ?>"
                                        class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center <?php echo e(request('kategori') == $cat->slug ? 'text-success fw-bold' : 'text-dark'); ?>">
                                        <span><?php echo e($cat->name_category); ?></span>
                                        <span
                                            class="badge rounded-pill bg-light text-dark border fw-normal"><?php echo e($cat->news_count); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/berita/berita.blade.php ENDPATH**/ ?>
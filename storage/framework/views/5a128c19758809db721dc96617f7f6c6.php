<?php $__env->startSection('content'); ?>
    
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0" style="background: rgba(0, 0, 0, 0.2); z-index: 1;"></div>

            <img src="<?php echo e($item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png')); ?>"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="<?php echo e($item->news_title); ?>">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('berita.index')); ?>" class="text-white text-decoration-none">Berita</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                
                <div class="col-lg-8 pe-lg-5">
                    <div class="konten-berita">
                        <h2 class="fw-bold mb-3" data-aos="fade-up"><?php echo e($item->news_title); ?></h2>

                        <div class="d-flex align-items-center flex-wrap mb-4 text-secondary py-3 border-bottom"
                            style="gap: 20px; font-size: 0.95rem;" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-calendar-check me-2 text-success" style="font-size: 1.1rem;"></i>
                                <span>Dipublikasikan: <strong><?php echo e($item->posted_at->locale('id')->translatedFormat('j F Y')); ?></strong></span>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->category): ?>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-tags-fill text-success me-2" style="font-size: 1.1rem;"></i>
                                    <span>Kategori:
                                        <a href="<?php echo e(route('berita.index', ['category' => $item->category->slug])); ?>" class="text-decoration-none fw-bold text-success">
                                            <?php echo e($item->category->name_category); ?>

                                        </a>
                                    </span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="text-secondary mb-5" style="line-height: 1.8; text-align: justify;" data-aos="fade-up" data-aos-delay="200">
                            <?php echo $item->news_content; ?>

                        </div>

                        
                        <div class="komentar-section mt-5 pt-4 border-top" data-aos="fade-up">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-chat-left-text-fill text-success fs-4 me-2"></i>
                                <h4 class="fw-bold mb-0">Komentar (<?php echo e($comments->count()); ?>)</h4>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i><?php echo e(session('success')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="comments-list mb-5">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="card border-0 bg-light rounded-4 mb-3 shadow-sm">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                                                        <?php echo e(strtoupper(substr($comment->guest_name, 0, 1))); ?>

                                                    </div>
                                                    <div>
                                                        <h6 class="fw-bold mb-0"><?php echo e($comment->guest_name); ?></h6>
                                                        <small class="text-muted"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0 text-secondary" style="white-space: pre-line;"><?php echo e($comment->body); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="text-center py-4 bg-light rounded-4 mb-5">
                                        <p class="text-muted mb-0 small">Belum ada komentar.</p>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div class="comment-form-container">
                                <h4 class="fw-bold mb-4">Tulis Komentar</h4>
                                <form method="POST" action="<?php echo e(route('comment.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="news_id" value="<?php echo e($item->id); ?>">
                                    <input type="hidden" name="parent_id" value="<?php echo e($parent_id ?? ''); ?>">

                                    <div class="row g-3">
                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Nama Lengkap*</label>
                                            <input type="text" name="guest_name"
                                                class="form-control p-3 bg-light border-0 <?php $__errorArgs = ['guest_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Nama Anda" required value="<?php echo e(old('guest_name')); ?>">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['guest_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>

                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Alamat Email*</label>
                                            <input type="email" name="guest_mail"
                                                class="form-control p-3 bg-light border-0 <?php $__errorArgs = ['guest_mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="email@anda.com" required value="<?php echo e(old('guest_mail')); ?>">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['guest_mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label class="form-label small fw-bold">Pesan Komentar*</label>
                                            <textarea name="body" class="form-control p-3 bg-light border-0 <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" placeholder="Tulis pendapat Anda..." required><?php echo e(old('body')); ?></textarea>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-2">
                                        <button type="submit" class="btn btn-success px-5 py-3 fw-bold shadow-sm rounded-pill d-flex align-items-center justify-content-center" style="min-width: 200px;">
                                            <i class="bi bi-send-fill me-2"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sticky-top" style="top: 100px; z-index: 10;" data-aos="fade-left">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                            <h5 class="fw-bold mb-0">Berita Lainnya</h5>
                            <a href="<?php echo e(route('berita.index')); ?>" class="text-success text-decoration-none fw-bold small">
                                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $beritaLainnya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4" style="height: 100px;">
                                            <img src="<?php echo e($related->image ? asset('storage/' . $related->image) : asset('assets/images/il-berita-01.png')); ?>"
                                                class="w-100 h-100 object-fit-cover" alt="<?php echo e($related->news_title); ?>">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-3 bg-white">
                                                <h6 class="card-title fw-bold mb-1 text-truncate-2" style="font-size: 0.85rem; line-height: 1.4;">
                                                    <a href="<?php echo e(route('berita.show', $related->slug)); ?>" class="text-dark text-decoration-none">
                                                        <?php echo e($related->news_title); ?>

                                                    </a>
                                                </h6>
                                                <small class="text-muted" style="font-size: 0.75rem;">
                                                    <i class="fa-regular fa-calendar me-1"></i><?php echo e($related->posted_at->translatedFormat('d F Y')); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-muted small text-center">Tidak ada berita lainnya.</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div class="position-fixed" style="bottom: 30px; left: 30px; z-index: 1050;">
        <a href="<?php echo e(route('berita.index')); ?>"
           class="btn btn-success rounded-circle shadow-lg d-flex align-items-center justify-content-center"
           style="width: 60px; height: 60px; transition: all 0.3s ease-in-out; border: 2px solid white;"
           title="Kembali ke Daftar Berita"
           onmouseover="this.style.transform='scale(1.1)'; this.style.backgroundColor='#059669';"
           onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='#198754';">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/berita/detail.blade.php ENDPATH**/ ?>
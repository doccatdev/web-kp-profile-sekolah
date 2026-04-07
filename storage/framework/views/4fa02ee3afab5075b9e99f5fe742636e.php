<nav class="navbar navbar-expand-lg navbar-dark fixed-top main-navbar transition-all"
    style="background-color: #fff; border-bottom: 1px solid #eee; padding: 5px 0;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center me-0" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('assets/icons/favicon-sekolah.ico')); ?>" height="50" width="50" alt="Logo"
                class="me-2">
            <div class="brand-text">
                <span class="d-block fw-bold lh-1"
                    style="font-size: 0.8rem; color: var(--emerald-green); letter-spacing: 0.3px;">
                    Yayasan Al-Husainiyyah Muthoyyibah
                </span>

                <span class="d-block fw-black lh-sm"
                    style="font-size: 1.05rem; color: var(--emerald-green); font-weight: 800; margin: 1px 0;">
                    SMP AL-HUSAINIYYAH
                </span>

                <div style="line-height: 1.1;">
                    <small class="fw-bold" style="font-size: 0.6rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <span style="color: #3498db;">Cerdas</span>,
                        <span style="color: #f1c40f;">Berkarakter</span>,
                        <span style="color: #e67e22;">Religius</span>
                    </small>
                    <span class="d-block text-muted fw-normal" style="font-size: 0.55rem;">
                        JL. Bukit Jarian No. 29/165D Kel. Hegarmanah, Kota Bandung
                    </span>
                </div>
            </div>
        </a>

        <div class="d-flex align-items-center order-lg-3 gap-2 ms-auto ms-lg-4">
            <a href="<?php echo e(url('/admin')); ?>"
                class="btn btn-success rounded-pill px-3 btn-sm fw-medium d-flex align-items-center justify-content-center"
                style="font-size: 0.7rem; height: 32px; background-color: #008156; border: none; min-width: 100px;">
                Portal Admin
            </a>

            <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav" style="background-color: var(--emerald-green); padding: 5px !important;">
                <span class="navbar-toggler-icon" style="width: 20px; height: 20px;"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse order-lg-2" id="mainNav">
            <ul class="navbar-nav mx-auto gap-lg-1" style="font-size: 0.85rem;">
                <li class="nav-item">
                    <a class="nav-link px-2 <?php echo e(request()->is('/') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/')); ?>">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle <?php echo e(request()->is('profil*') ? 'active' : ''); ?>"
                        href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="<?php echo e(url('/profil/profil-sekolah')); ?>">Profil Sekolah</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/profil/sejarah')); ?>">Sejarah</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/profil/visi-misi')); ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/profil/data-guru')); ?>">Data Guru</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/program-unggulan')); ?>">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/fasilitas')); ?>">Fasilitas</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-2 <?php echo e(request()->is('ekstrakulikuler*') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/ekstrakulikuler')); ?>">Ekstrakurikuler</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle <?php echo e(request()->is('pengumuman*') || request()->is('berita*') ? 'active' : ''); ?>"
                        href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                    <ul class="dropdown-menu shadow-sm border-0 animate slideIn">
                        <li><a class="dropdown-item" href="<?php echo e(url('/pengumuman')); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(url('/berita')); ?>">Berita</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-2 <?php echo e(request()->is('ppdb*') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/ppdb')); ?>">SPMB</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-2 <?php echo e(request()->is('prestasi*') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/prestasi')); ?>">Prestasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-2 <?php echo e(request()->is('kontak*') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/kontak')); ?>">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>
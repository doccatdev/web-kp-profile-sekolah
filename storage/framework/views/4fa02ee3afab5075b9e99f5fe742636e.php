 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
     <div class="container">
         <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
             <img src="<?php echo e(asset('assets/icons/sekolah-ico.ico')); ?>" height="55" width="55" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 
                 <li class="nav-item">
                     <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" aria-current="page"
                         href="<?php echo e(url('/')); ?>">Beranda</a>
                 </li>

                 
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle <?php echo e(request()->is('profil*') ? 'active' : ''); ?>" href="#"
                         role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Profil
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?php echo e(url('/profil/profil-sekolah')); ?>">Profil Sekolah</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/profil/sejarah')); ?>">Sejarah Singkat</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/profil/visi-misi')); ?>">Visi & Misi</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/profil/data-guru')); ?>">Data Guru
                             </a></li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/program-unggulan')); ?>">Program Unggulan</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/fasilitas')); ?>">Sarana & Prasarana</a></li>
                     </ul>
                 </li>

                 
                 <li class="nav-item">
                     <a class="nav-link <?php echo e(request()->is('ekstrakulikuler*') ? 'active' : ''); ?>"
                         href="<?php echo e(url('/ekstrakulikuler')); ?>">Ekstrakulikuler</a>
                 </li>

                 
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle <?php echo e(request()->is('pengumuman*') || request()->is('berita*') ? 'active' : ''); ?>"
                         href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Informasi
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?php echo e(url('/pengumuman')); ?>">Pengumuman</a></li>
                         <li><a class="dropdown-item" href="<?php echo e(url('/berita')); ?>">Berita</a></li>
                     </ul>
                 </li>

                 
                 <li class="nav-item">
                     <a class="nav-link <?php echo e(request()->is('ppdb*') ? 'active' : ''); ?>"
                         href="<?php echo e(url('/ppdb')); ?>">PPDB</a>
                 </li>

                 
                 <li class="nav-item">
                     <a class="nav-link <?php echo e(request()->is('prestasi*') ? 'active' : ''); ?>"
                         href="<?php echo e(url('/prestasi')); ?>">Prestasi</a>
                 </li>

                 
                 <li class="nav-item">
                     <a class="nav-link <?php echo e(request()->is('kontak*') ? 'active' : ''); ?>"
                         href="<?php echo e(url('/kontak')); ?>">Kontak</a>
                 </li>
             </ul>
             <div class="d-flex">
                 <a href="<?php echo e(url('/admin')); ?>" class="btn btn-danger">Login</a>
             </div>
         </div>
     </div>
 </nav>
 <!-- End Navbar -->
<?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>
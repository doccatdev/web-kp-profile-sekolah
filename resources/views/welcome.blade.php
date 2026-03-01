@extends('layouts.layouts')

@section('content')
    <!-- Hero -->
    <section id="hero" class="d-flex align-items-center relative w-100"
        style="background: url('{{ asset('assets/images/smp-bg.jpg') }}'); background-size: cover; background-position: center; min-height: 85vh;">

        <div class="position-absolute w-100 h-100 top-0 start-0 bg-dark" style="opacity: 0.6; z-index: 0;"></div>

        <div class="container position-relative text-white" style="z-index: 1;">
            <div class="row align-items-center text-start">
                <div class="col-lg-7" data-aos="fade-right">

                    @if ($ppdb)
                        {{-- Tampilan saat PPDB Aktif --}}
                        <span class="badge bg-success mb-3 px-3 py-2 rounded-pill shadow-sm">
                            Penerimaan Peserta Didik Baru (PPDB) {{ $ppdb->tahun_ajaran }}
                        </span>
                        <h1 class="display-4 mb-4 fw-bold">Masa Depan Gemilang <br>
                            <span style="color: #fbbf24;">Mulai dari Sini</span>
                        </h1>
                        <p class="lead mb-5" style="max-width: 600px;">
                            Pendaftaran siswa baru tahun ajaran {{ $ppdb->tahun_ajaran }} telah resmi dibuka. Segera
                            daftarkan putra-putri Anda untuk bergabung bersama kami.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="{{ url('/ppdb') }}" class="btn btn-emerald btn-lg rounded-pill px-5 shadow">
                                Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    @else
                        {{-- Tampilan Default (Saat PPDB Tutup) --}}
                        <h1 class="display-4 mb-4 fw-bold">Membentuk Generasi <br>
                            <span style="color: #fbbf24;">Cerdas, Berkarakter & Religius</span>
                        </h1>
                        <p class="lead mb-5" style="max-width: 600px;">
                            SMP Al-Husainiyyah berkomitmen memberikan pendidikan berkualitas dengan memadukan kurikulum
                            nasional dan nilai-nilai Islami yang moderat.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#strength" class="btn btn-emerald btn-lg rounded-pill px-5 shadow">
                                Lihat Keunggulan <i class="bi bi-arrow-down ms-2"></i>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Stats Bar -->
    <section class="py-4 bg-white shadow-sm" style="margin-top: 0; z-index: 10; position: relative;">
        <div class="container">
            <div class="row text-center g-4 align-items-center justify-content-center">
                <div class="col-6 col-md-3" data-aos="fade-up">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <span class="fw-bold display-6 text-success">B</span>
                        <span class="small text-muted fw-semibold">Akreditasi</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-lightbulb-fill fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Cerdas</span>
                        <span class="small text-muted" style="font-size:11px;">Unggul dalam ilmu</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-shield-fill-check fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Berkarakter</span>
                        <span class="small text-muted" style="font-size:11px;">Berakhlak mulia</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-moon-stars-fill fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Religius</span>
                        <span class="small text-muted" style="font-size:11px;">Teguh dalam iman</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section id="program-unggulan" class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Pilar Pendidikan</span>
                <h2 class="fw-bold display-6">Program <span class="text-success">Unggulan</span></h2>
                <div class="stripe-red mx-auto mt-3"></div>
                <p class="text-muted mt-3 mx-auto" style="max-width: 500px;">Kurikulum terintegrasi antara ilmu umum dan
                    nilai Islam moderat untuk mencetak generasi unggul.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                        style="cursor:pointer;">
                        <img src="{{ asset('assets/images/activity-01.jpg') }}" class="w-100 object-fit-cover"
                            style="height: 320px;" alt="Tahfidz">
                        <div class="ig-overlay"></div>
                        <div class="position-absolute bottom-0 start-0 p-4 text-white" style="z-index:2;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                        class="bi bi-book-half fs-5"></i></div>
                                <span class="badge bg-success bg-opacity-75 rounded-pill small">Unggulan</span>
                            </div>
                            <h4 class="fw-bold mb-1">Tahfidz Qur'an</h4>
                            <p class="small opacity-75 mb-3">Target hafalan minimal 3 Juz per tahun bagi setiap siswa.</p>
                            <a href="{{ url('/program-unggulan') }}"
                                class="btn btn-outline-light btn-sm rounded-pill px-4">Read More <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                        style="cursor:pointer;">
                        <img src="{{ asset('assets/images/activity-02.jpg') }}" class="w-100 object-fit-cover"
                            style="height: 320px;" alt="Bilingual">
                        <div class="ig-overlay"></div>
                        <div class="position-absolute bottom-0 start-0 p-4 text-white" style="z-index:2;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                        class="bi bi-translate fs-5"></i></div>
                                <span class="badge bg-warning bg-opacity-75 text-dark rounded-pill small">Bilingual</span>
                            </div>
                            <h4 class="fw-bold mb-1">Bilingual Class</h4>
                            <p class="small opacity-75 mb-3">Pengembangan bahasa kompetitif Arab & Inggris secara intensif.
                            </p>
                            <a href="{{ url('/program-unggulan') }}"
                                class="btn btn-outline-light btn-sm rounded-pill px-4">Read More <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                        style="cursor:pointer;">
                        <img src="{{ asset('assets/images/activity-03.jpg') }}" class="w-100 object-fit-cover"
                            style="height: 320px;" alt="Digital">
                        <div class="ig-overlay"></div>
                        <div class="position-absolute bottom-0 start-0 p-4 text-white" style="z-index:2;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                        class="bi bi-laptop fs-5"></i></div>
                                <span class="badge bg-info bg-opacity-75 text-dark rounded-pill small">Digital</span>
                            </div>
                            <h4 class="fw-bold mb-1">Digital Skills</h4>
                            <p class="small opacity-75 mb-3">Penguasaan teknologi informasi dan multimedia terkini.</p>
                            <a href="{{ url('/program-unggulan') }}"
                                class="btn btn-outline-light btn-sm rounded-pill px-4">Read More <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/program-unggulan') }}" class="btn btn-emerald rounded-pill px-5">
                    Lihat Semua Program Unggulan <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Strength Section: Bento Grid (Prestasi) -->
    <section id="strength" class="py-5 bg-white">
        <div class="container py-5">
            <div class="row align-items-end mb-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Prestasi siswa</span>
                    <h2 class="fw-bold display-5 mt-2">Dedikasi & <span class="text-success">Prestasi</span> Tanpa Batas
                    </h2>
                    <div class="stripe-red" style="margin-left:0;"></div>
                </div>
                <div class="col-lg-5 text-lg-end mt-3 mt-lg-0" data-aos="fade-left">
                    <a href="{{ url('/prestasi') }}" class="btn btn-emerald rounded-pill px-4">Lihat Galeri Prestasi <i
                            class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="strength-bento">
                <!-- Achievement 1 -->
                <div class="strength-item overflow-hidden"
                    style="grid-column: span 4; grid-row: span 3; background: url('{{ asset('assets/images/activity-01.jpg') }}') center/cover;"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="h-100 d-flex flex-column justify-content-end p-4 rounded-4"
                        style="background: linear-gradient(to top, rgba(20,83,45,0.92) 0%, transparent 60%);">
                        <span class="badge bg-success bg-opacity-75 rounded-pill mb-2 d-inline-block"
                            style="width:fit-content!important;">Akademik</span>
                        <h5 class="fw-bold mb-1 text-white">Juara 1 OSN Matematika</h5>
                        <p class="text-white small mb-0 opacity-75">Tingkat Kabupaten Bekasi 2024</p>
                    </div>
                </div>

                <!-- Achievement 2 -->
                <div class="strength-item overflow-hidden"
                    style="grid-column: span 4; grid-row: span 3; background: url('{{ asset('assets/images/activity-02.jpg') }}') center/cover;"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="h-100 d-flex flex-column justify-content-end p-4 rounded-4"
                        style="background: linear-gradient(to top, rgba(161,118,0,0.92) 0%, transparent 60%);">
                        <span class="badge bg-warning text-dark rounded-pill mb-2 d-inline-block"
                            style="width:fit-content!important;">Non-Akademik</span>
                        <h5 class="fw-bold mb-1 text-white">Emas Pencak Silat</h5>
                        <p class="text-white small mb-0 opacity-75">O2SN Provinsi Jawa Barat</p>
                    </div>
                </div>

                <!-- Achievement 3 -->
                <div class="strength-item overflow-hidden"
                    style="grid-column: span 4; grid-row: span 3; background: url('{{ asset('assets/images/activity-03.jpg') }}') center/cover;"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="h-100 d-flex flex-column justify-content-end p-4 rounded-4"
                        style="background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 60%);">
                        <span class="badge bg-light text-dark rounded-pill mb-2 d-inline-block"
                            style="width:fit-content!important;"><i class="bi bi-book me-1"></i>Tahfidz</span>
                        <h5 class="fw-bold mb-1 text-white">Hafidz Al-Qur'an 30 Juz</h5>
                        <p class="text-white small mb-0 opacity-75">Prestasi tertinggi bidang Tahfidz yang
                            membanggakan pesantren.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section id="fasilitas" class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Lingkungan Belajar</span>
                <h2 class="fw-bold display-6">Fasilitas <span class="text-success">Modern</span></h2>
                <div class="stripe-red mx-auto mt-3"></div>
                <p class="text-muted mt-3 mx-auto" style="max-width: 500px;">Sarana dan prasarana lengkap untuk mendukung
                    proses belajar mengajar yang optimal.</p>
            </div>

            <div class="row g-4">
                <div class="col-6 col-md-4" data-aos="fade-up">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-display fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Lab Komputer</h5>
                        <p class="text-muted small mb-3">Laboratorium komputer modern dengan koneksi internet untuk
                            mendukung pembelajaran digital.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-dribbble fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Sarana Olahraga</h5>
                        <p class="text-muted small mb-3">Lapangan dan perlengkapan olahraga lengkap untuk aktivitas fisik
                            siswa.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-building-fill fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Masjid</h5>
                        <p class="text-muted small mb-3">Masjid sekolah sebagai pusat ibadah dan pembinaan spiritual siswa
                            setiap hari.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-music-note-beamed fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Alat Kesenian</h5>
                        <p class="text-muted small mb-3">Perlengkapan seni seperti alat musik dan peralatan tari untuk
                            pengembangan bakat siswa.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-door-open fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Ruang Belajar</h5>
                        <p class="text-muted small mb-3">Ruang kelas yang nyaman dan kondusif untuk proses belajar mengajar
                            yang efektif.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-collection fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Ruang Serba Guna</h5>
                        <p class="text-muted small mb-3">Aula serbaguna untuk kegiatan rapat, seminar, dan acara sekolah
                            lainnya.</p>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-success fw-semibold small text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>


                <div class="text-center mt-5">
                    <a href="{{ url('/fasilitas') }}" class="btn btn-emerald rounded-pill px-5">Lihat Semua Fasilitas <i
                            class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section id="ekstrakulikuler" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Pengembangan Bakat</span>
                <h2 class="fw-bold display-6">Ekstrakurikuler <span class="text-success">Unggulan</span></h2>
                <div class="stripe-red mx-auto mt-3"></div>
                <p class="text-muted mt-3 mx-auto" style="max-width: 500px;">Wadah pengembangan minat, bakat, dan potensi
                    siswa di luar jam pelajaran.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm feature-card text-center p-4 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-shield-fill fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Pencak Silat</h6>
                        <p class="text-muted small mb-2">Bela diri tradisional</p>
                        <a href="{{ url('/ekstrakulikuler') }}"
                            class="text-success small fw-semibold text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm feature-card text-center p-4 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-dribbble fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Futsal</h6>
                        <p class="text-muted small mb-2">Olahraga tim & sportivitas</p>
                        <a href="{{ url('/ekstrakulikuler') }}"
                            class="text-success small fw-semibold text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm feature-card text-center p-4 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-person-arms-up fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Seni Tari</h6>
                        <p class="text-muted small mb-2">Tari tradisional & modern</p>
                        <a href="{{ url('/ekstrakulikuler') }}"
                            class="text-success small fw-semibold text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm feature-card text-center p-4 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-compass fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Pramuka</h6>
                        <p class="text-muted small mb-2">Kepemimpinan & alam bebas</p>
                        <a href="{{ url('/ekstrakulikuler') }}"
                            class="text-success small fw-semibold text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm feature-card text-center p-4 h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:56px;height:56px;">
                            <i class="bi bi-moon-stars-fill fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Rohis / Tahfidz</h6>
                        <p class="text-muted small mb-2">Kerohanian & hafalan Qur'an</p>
                        <a href="{{ url('/ekstrakulikuler') }}"
                            class="text-success small fw-semibold text-decoration-none">Read More <i
                                class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/ekstrakulikuler') }}" class="btn btn-emerald rounded-pill px-5">Lihat Semua Ekskul <i
                        class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </section>

    <!-- Advanced Instagram Feed: Kegiatan Terbaru -->
    <section id="instagram-feed" class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-7" data-aos="fade-right">
                    <span
                        class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal d-inline-flex align-items-center gap-2">
                        <span class="live-dot"></span> Live Feed
                    </span>
                    <h2 class="fw-bold display-6 mt-2">Kegiatan <span class="text-success">Terbaru</span></h2>
                    <div class="stripe-red" style="margin-left:0;"></div>
                    <p class="text-muted mt-3">Dokumentasi momen nyata siswa kami, diperbarui secara real-time dari
                        Instagram.</p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0" data-aos="fade-left">
                    <a href="https://instagram.com" target="_blank" class="btn btn-instagram shadow">
                        <i class="bi bi-instagram me-2"></i>Follow @SmpAlHusainiyyah
                    </a>
                </div>
            </div>

            <div class="ig-grid" data-aos="zoom-in">
                @php
                    $captions = [
                        'Upacara peringatan Hari Pendidikan bersama seluruh warga sekolah. 🎓',
                        'Latihan rutin pencak silat yang menghasilkan juara-juara baru! 🥋',
                        'Suasana belajar siswa di kelas dengan penuh semangat. 📚',
                        'Kegiatan Jumat berkah bersama guru dan siswa. 🤲',
                    ];
                @endphp
                @for ($i = 1; $i <= 4; $i++)
                    <div class="ig-item shadow-sm position-relative">
                        <img src="{{ asset('assets/images/activity-0' . ($i > 3 ? 1 : $i) . '.jpg') }}"
                            alt="Feed {{ $i }}" loading="lazy">
                        <div class="ig-overlay">
                            <div class="ig-stats">
                                <span><i class="bi bi-heart-fill me-1"></i> {{ rand(80, 350) }}</span>
                                <span><i class="bi bi-chat-fill me-1"></i> {{ rand(5, 40) }}</span>
                            </div>
                            <p class="ig-caption small mt-2 px-2">{{ $captions[$i - 1] }}</p>
                        </div>
                        @if ($i === 1)
                            <div class="live-indicator">
                                <span class="live-dot me-1"></span> LIVE
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Dynamic Recent News Toast -->
    <div id="recent-news-toast">
        <div class="d-flex align-items-start gap-3">
            <div class="bg-warning bg-opacity-15 text-warning rounded-3 p-2 d-inline-flex flex-shrink-0">
                <i class="bi bi-trophy-fill fs-5"></i>
            </div>
            <div>
                <p class="fw-bold mb-0 small text-dark">🏆 Prestasi Terbaru!</p>
                <p class="text-muted mb-0" style="font-size:12px;">siswa meraih <strong>Juara 1 Nasional</strong> OSN
                    2024</p>
            </div>
            <button type="button" class="btn-close ms-auto flex-shrink-0" style="font-size:10px;"
                onclick="document.getElementById('recent-news-toast').style.display='none'"></button>
        </div>
    </div>
@endsection

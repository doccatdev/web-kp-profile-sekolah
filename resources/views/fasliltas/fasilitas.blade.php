@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #009b4d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold" data-aos="fade-down">Sarana & Prasarana</h1>
            <p class="lead mb-0 opacity-75" data-aos="fade-up" data-aos-delay="100">Fasilitas modern untuk mendukung
                pembelajaran optimal siswa</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4">
                <!-- Lab Komputer -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-display fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Laboratorium Komputer</h4>
                        <p class="text-muted mb-4 flex-grow-1">Pusat pengembangan teknologi dan literasi digital siswa
                            dengan perangkat komputer terbaru.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'laboratorium-komputer']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Sarana Olahraga -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-dribbble fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Sarana Olahraga</h4>
                        <p class="text-muted mb-4 flex-grow-1">Area olahraga memadai untuk menjaga kebugaran jasmani dan
                            pengembangan bakat olahraga.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'sarana-olahraga']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Masjid -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-building-fill fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Masjid</h4>
                        <p class="text-muted mb-4 flex-grow-1">Pusat ibadah dan kegiatan keagamaan, membentuk siswa yang
                            religious dan berakhlak mulia.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'masjid']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Alat Kesenian -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-music-note-beamed fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Alat Kesenian</h4>
                        <p class="text-muted mb-4 flex-grow-1">Wadah ekspresi seni dan kreativitas siswa dengan berbagai
                            inventaris alat kesenian edukatif.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'alat-kesenian']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Ruang Belajar -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-door-open fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Ruang Belajar</h4>
                        <p class="text-muted mb-4 flex-grow-1">Ruang kelas interaktif dan nyaman, didesain untuk menjamin
                            kondusivitas kegiatan belajar mengajar.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'ruang-belajar']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Ruang Serba Guna -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-collection fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Ruang Serba Guna</h4>
                        <p class="text-muted mb-4 flex-grow-1">Aula luas multifungsi yang siap digunakan untuk berbagai
                            acara, seminar, maupun pertemuan sekolah.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'ruang-serba-guna']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Perpustakaan -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-book fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Perpustakaan</h4>
                        <p class="text-muted mb-4 flex-grow-1">Surga literasi dengan koleksi buku beragam, dari literatur
                            Islam hingga sumber pengetahuan umum terbaik.</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'perpustakaan']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Toilet dan Wastafel -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 feature-card">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:64px;height:64px;">
                            <i class="bi bi-droplet-half fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Toilet & Wastafel</h4>
                        <p class="text-muted mb-4 flex-grow-1">Sanitasi yang bersih, terawat, dan memadai sebagai
                            perwujudan peduli kebersihan (Kebersihan sebagian dari iman).</p>
                        <a href="{{ route('fasilitas.detail', ['id' => 'toilet-dan-wastafel']) }}"
                            class="btn btn-emerald w-100 rounded-pill mt-auto">Lihat Detail <i
                                class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

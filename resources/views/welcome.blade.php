@extends('layouts.layouts')

@section('content')
    <!-- Hero -->
    <section id="hero" class="d-flex align-items-center relative w-100 bg-success" style="min-height: 85vh;">

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
                            <a href="{{ url('/ppdb') }}" class="btn btn-outline-white btn-lg rounded-pill px-5">
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
                            <a href="#strength" class="btn btn-outline-white btn-lg rounded-pill px-5">
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
    <section class="py-4 bg-white border-bottom" style="margin-top: 0; z-index: 10; position: relative;">
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
                @forelse ($programUnggulan as $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top object-fit-cover"
                                style="height: 220px;" alt="{{ $item->nama_program }}">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex">
                                        <i class="{{ $item->icon_class ?? 'bi bi-star-fill' }} fs-5"></i>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">
                                        {{ $item->badge_text ?? 'Unggulan' }}
                                    </span>
                                </div>
                                <h5 class="fw-bold mb-2 text-dark">{{ $item->nama_program }}</h5>
                                <p class="small text-muted mb-4 flex-grow-1">{{ $item->deskripsi_singkat }}</p>
                                <a href="{{ route('program-unggulan.detail', $item->slug) }}"
                                    class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">
                                    Read More <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted italic">Data program unggulan belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            @if ($programUnggulan->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('program-unggulan.index') }}" class="btn btn-emerald rounded-pill px-5">
                        Lihat Semua Program Unggulan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif
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

            <div class="row g-4">
                <!-- Achievement 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border rounded-3 overflow-hidden shadow-none">
                        <img src="{{ asset('assets/images/activity-01.jpg') }}" class="card-img-top object-fit-cover"
                            style="height: 200px;" alt="Akademik">
                        <div class="card-body p-4 bg-white">
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill mb-3">Akademik</span>
                            <h5 class="fw-bold mb-1 text-dark">Juara 1 OSN Matematika</h5>
                            <p class="text-muted small mb-0">Tingkat Kabupaten Bekasi 2024</p>
                        </div>
                    </div>
                </div>

                <!-- Achievement 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border rounded-3 overflow-hidden shadow-none">
                        <img src="{{ asset('assets/images/activity-02.jpg') }}" class="card-img-top object-fit-cover"
                            style="height: 200px;" alt="Non-Akademik">
                        <div class="card-body p-4 bg-white">
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill mb-3">Non-Akademik</span>
                            <h5 class="fw-bold mb-1 text-dark">Emas Pencak Silat</h5>
                            <p class="text-muted small mb-0">O2SN Provinsi Jawa Barat</p>
                        </div>
                    </div>
                </div>

                <!-- Achievement 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border rounded-3 overflow-hidden shadow-none">
                        <img src="{{ asset('assets/images/activity-03.jpg') }}" class="card-img-top object-fit-cover"
                            style="height: 200px;" alt="Tahfidz">
                        <div class="card-body p-4 bg-white">
                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill mb-3"><i
                                    class="bi bi-book me-1"></i>Tahfidz</span>
                            <h5 class="fw-bold mb-1 text-dark">Hafidz Al-Qur'an 30 Juz</h5>
                            <p class="text-muted small mb-0">Prestasi tertinggi bidang Tahfidz yang membanggakan pesantren.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fasilitas-->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3 py-2 mb-2">Lingkungan
                    Belajar</span>
                <h2 class="fw-bold">Fasilitas <span class="text-success">Modern</span></h2>
                <p class="text-muted">Sarana dan prasarana lengkap untuk mendukung proses<br>belajar mengajar yang optimal.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($fasilitas as $f)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border">
                            <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center mb-3"
                                style="width:48px;height:48px;">
                                <i class="{{ $f->icon_class ?? 'bi bi-building' }} fs-4"></i>
                            </div>

                            <h5 class="fw-bold mb-2">{{ $f->nama_fasilitas }}</h5>
                            <p class="text-muted small mb-4">
                                {{ $f->deskripsi_singkat }}
                            </p>

                            <a href="{{ route('fasilitas.detail', $f->slug) }}"
                                class="text-success text-decoration-none fw-bold small d-flex align-items-center mt-auto">
                                Read More <i class="bi bi-chevron-right ms-1" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted italic">Data fasilitas sekolah belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            @if ($fasilitas->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-success rounded-pill px-4 py-2">
                        Lihat Semua Fasilitas <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <!-- End Fasilitas Section-->

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
                    <div class="card border rounded-3 overflow-hidden shadow-none text-center p-4 h-100">
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
                    <div class="card border rounded-3 overflow-hidden shadow-none text-center p-4 h-100">
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
                    <div class="card border rounded-3 overflow-hidden shadow-none text-center p-4 h-100">
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
                    <div class="card border rounded-3 overflow-hidden shadow-none text-center p-4 h-100">
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
                <div class="text-center mt-5">
                    <a href="{{ url('/ekstrakulikuler') }}" class="btn btn-emerald rounded-pill px-5">Lihat Semua Ekskul
                        <i class="bi bi-arrow-right ms-1"></i></a>
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

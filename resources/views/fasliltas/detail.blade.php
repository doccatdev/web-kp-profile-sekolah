@extends('layouts.layouts')

@section('content')
    <!-- Detail Header -->
    <section class="py-5" style="margin-top: 76px; background: #f8fafc;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Back Button -->
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-outline-success rounded-pill mb-4 px-4 shadow-sm"
                        data-aos="fade-right">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Fasilitas
                    </a>

                    <!-- Card Detail -->
                    <div class="card border-0 rounded-4 shadow-lg overflow-hidden" data-aos="fade-up">
                        <div class="position-relative">
                            <img src="{{ asset('assets/images/activity-02.jpg') }}" class="w-100 object-fit-cover"
                                style="height: 450px;" alt="{{ $title }}">
                            <div class="position-absolute bottom-0 start-0 w-100 h-50"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"></div>
                            <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white w-100">
                                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal shadow">Fasilitas
                                    Sekolah</span>
                                <h2 class="fw-bold display-5 mb-0" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                                    {{ $title }}</h2>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5 bg-white">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="fw-bold text-dark mb-4 mt-2">Tentang {{ $title }}</h4>
                                    <div class="stripe-red mb-4" style="margin-left: 0;"></div>

                                    <div class="text-muted" style="line-height: 1.8; font-size: 1.1rem;">
                                        <p>Kami bangga memfasilitasi setiap siswa dengan sarana modern dan memadai demi
                                            mendukung setiap langkah mereka dalam menuntut ilmu.
                                            <strong>{{ $title }}</strong> dirancang tidak hanya untuk memenuhi
                                            standar fungsionalitas, namun juga untuk menanamkan kebiasaan positif dan etos
                                            kerja Islami.
                                        </p>

                                        <h5 class="fw-bold text-dark mt-5 mb-3">Keunggulan & Manfaat</h5>
                                        <ul class="list-unstyled d-grid gap-3">
                                            <li class="d-flex align-items-start">
                                                <i class="bi bi-check-circle-fill text-success fs-5 me-3 mt-1"></i>
                                                <span>Menciptakan lingkungan yang kondusif untuk menunjang proses kegiatan
                                                    belajar mengajar sesuai kurikulum yang terintegrasi.</span>
                                            </li>
                                            <li class="d-flex align-items-start">
                                                <i class="bi bi-check-circle-fill text-success fs-5 me-3 mt-1"></i>
                                                <span>Infrastruktur modern yang secara konsisten dirawat secara
                                                    profesional.</span>
                                            </li>
                                            <li class="d-flex align-items-start">
                                                <i class="bi bi-check-circle-fill text-success fs-5 me-3 mt-1"></i>
                                                <span>Memanjakan seluruh civitas akademika dalam menjalankan aktivitas
                                                    positif harian.</span>
                                            </li>
                                        </ul>

                                        <!-- Image Gallery Slider -->
                                        <h5 class="fw-bold text-dark mt-5 mb-3">Galeri {{ $title }}</h5>
                                        <div id="fasilitasGallery"
                                            class="carousel slide rounded-4 overflow-hidden shadow-sm mb-4"
                                            data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#fasilitasGallery"
                                                    data-bs-slide-to="0" class="active" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#fasilitasGallery"
                                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#fasilitasGallery"
                                                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="3000">
                                                    <img src="{{ asset('assets/images/activity-01.jpg') }}"
                                                        class="d-block w-100 object-fit-cover" style="height: 350px;"
                                                        alt="Galeri 1">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="3000">
                                                    <img src="{{ asset('assets/images/activity-02.jpg') }}"
                                                        class="d-block w-100 object-fit-cover" style="height: 350px;"
                                                        alt="Galeri 2">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="3000">
                                                    <img src="{{ asset('assets/images/activity-03.jpg') }}"
                                                        class="d-block w-100 object-fit-cover" style="height: 350px;"
                                                        alt="Galeri 3">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#fasilitasGallery" data-bs-slide="prev">
                                                <span
                                                    class="carousel-control-prev-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                                    aria-hidden="true"
                                                    style="width: 2rem; height: 2rem; background-size: 50%;"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#fasilitasGallery" data-bs-slide="next">
                                                <span
                                                    class="carousel-control-next-icon bg-dark rounded-circle p-2 bg-opacity-50"
                                                    aria-hidden="true"
                                                    style="width: 2rem; height: 2rem; background-size: 50%;"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sidebar Details -->
                                <div class="col-md-4 mt-5 mt-md-0">
                                    <div class="bg-light p-4 rounded-4 border">
                                        <h5 class="fw-bold border-bottom pb-3 mb-4">Informasi Tambahan</h5>

                                        <div class="mb-4">
                                            <span class="d-block text-muted small mb-1">Status Ketersediaan</span>
                                            <span
                                                class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2"><i
                                                    class="bi bi-check-circle me-1"></i> Tersedia & Aktif</span>
                                        </div>

                                        <div class="mb-4">
                                            <span class="d-block text-muted small mb-1">Peruntukan</span>
                                            <p class="fw-medium mb-0 text-dark">Seluruh Civitas Akademika (Siswa, Guru,
                                                Staf)</p>
                                        </div>
                                    </div>

                                    <!-- CTA -->
                                    <div class="mt-4 p-4 rounded-4 text-center text-white"
                                        style="background: var(--emerald-green, #14532d);">
                                        <i class="bi bi-info-circle-fill display-5 mb-3 d-block opacity-75"></i>
                                        <h5 class="fw-bold text-white mb-2">Ingin mendaftar?</h5>
                                        <p class="small opacity-75 mb-4">Bergabunglah bersama kami dan nikmati semua
                                            fasilitas unggulan SMP Al Husainiyah.</p>
                                        <a href="{{ url('/ppdb') }}"
                                            class="btn btn-light rounded-pill fw-bold text-success w-100 shadow-sm">Info
                                            PPDB</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

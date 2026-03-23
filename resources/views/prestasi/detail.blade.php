@extends('layouts.layouts')

@section('content')
    @php
        $title = $title ?? ucwords(str_replace('-', ' ', $id ?? 'Detail Prestasi'));
    @endphp
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, #009b4d; z-index: 1;"></div>
            {{-- In a real app we would use $prestasi->image, but we fallback to a placeholder --}}
            <img src="{{ asset('assets/images/activity-01.jpg') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $title ?? 'Detail Prestasi' }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('prestasi.index') }}"
                                class="text-white text-decoration-none">Prestasi</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white p-0">
                            <div class="konten-berita">
                                {{-- 1. Judul --}}
                                <h2 class="fw-bold mb-3">{{ $title ?? 'Detail Prestasi' }}</h2>

                                {{-- 2. Baris Icon --}}
                                <div class="d-flex align-items-center flex-wrap mb-4 text-secondary"
                                    style="gap: 20px; font-size: 0.95rem;">

                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-check me-2 text-success fs-5"></i>
                                        <span>Dipublikasikan: <strong>{{ date('Y') }}</strong></span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-layers-fill me-2 text-success fs-5"></i>
                                        <span>Kategori Lomba: <strong class="text-success">Tingkat Nasional</strong></span>
                                    </div>
                                </div>

                                {{-- 3. Isi Konten (Hanya Galeri) --}}
                                <div class="text-secondary body-text"
                                    style="line-height: 1.8; text-align: justify; color: #4b5563;">

                                    <h5 class="fw-bold text-dark mt-4 mb-3">Galeri {{ $title }}</h5>
                                    <div id="fasilitasGallery" class="carousel slide overflow-hidden mb-4"
                                        data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#fasilitasGallery" data-bs-slide-to="0"
                                                class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#fasilitasGallery" data-bs-slide-to="1"
                                                aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#fasilitasGallery" data-bs-slide-to="2"
                                                aria-label="Slide 3"></button>
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
                        </div>
                    </div>

                    {{-- Back Button --}}
                    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Prestasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

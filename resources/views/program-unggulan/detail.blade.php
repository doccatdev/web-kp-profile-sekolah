@extends('layouts.layouts')

@section('content')
    @php
        // Provide fallback empty data if the controller does not pass $program yet
        if (!isset($program)) {
            $program = (object) [
                'title' => 'Nama Program Unggulan',
                'image' => null,
                'description' =>
                    '<p class="lead text-muted">Ini adalah contoh detail program unggulan yang menampilkan deskripsi lengkap kurikulum ekstrakurikuler, atau kegiatan lainnya.</p><p>Menggabungkan pendidikan umum dan agama secara proporsional. SMP Al-Husainiyyah berkomitmen untuk mencetak lulusan terbaik.</p>',
            ];
        }
    @endphp

    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 400px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-02.jpg') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $program->title }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/program-unggulan') }}"
                                class="text-white text-decoration-none">Program Unggulan</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
                <h1 class="fw-bold text-white display-4 mb-0" data-aos="fade-up">{{ $program->title }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white p-0">

                            <div class="content article-body text-dark lh-lg fs-5 mb-5" style="color: #444 !important;">
                                {!! $program->description !!}
                            </div>

                            <div class="gallery-section mt-5">
                                <h4 class="fw-bold text-dark mb-4 d-flex align-items-center">
                                    <span class="bg-success rounded-2 me-2" style="width: 12px; height: 24px;"></span>
                                    Dokumentasi Kegiatan
                                </h4>

                                <div id="programGallery" class="carousel slide overflow-hidden" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#programGallery" data-bs-slide-to="0"
                                            class="active" aria-current="true"></button>
                                        <button type="button" data-bs-target="#programGallery"
                                            data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#programGallery"
                                            data-bs-slide-to="2"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="3500">
                                            <img src="{{ asset('assets/images/activity-01.jpg') }}"
                                                class="d-block w-100 object-fit-cover" style="height: 450px;"
                                                alt="Dokumentasi 1">
                                        </div>
                                        <div class="carousel-item" data-bs-interval="3500">
                                            <img src="{{ asset('assets/images/activity-02.jpg') }}"
                                                class="d-block w-100 object-fit-cover" style="height: 450px;"
                                                alt="Dokumentasi 2">
                                        </div>
                                        <div class="carousel-item" data-bs-interval="3500">
                                            <img src="{{ asset('assets/images/activity-03.jpg') }}"
                                                class="d-block w-100 object-fit-cover" style="height: 450px;"
                                                alt="Dokumentasi 3">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#programGallery"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-50"
                                            aria-hidden="true" style="background-size: 50%;"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#programGallery"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-50"
                                            aria-hidden="true" style="background-size: 50%;"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            <hr class="my-5 opacity-25">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                <a href="{{ url('/program-unggulan') }}"
                                    class="btn btn-outline-success rounded-pill px-4 py-2 mb-3 mb-md-0 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
                                </a>

                                <div class="d-flex align-items-center">
                                    <span class="text-muted small fw-bold me-3">Bagikan:</span>
                                    <a href="#" class="btn btn-light rounded-circle text-success me-2"
                                        style="width:40px;height:40px;display:inline-flex;align-items:center;justify-content:center;"><i
                                            class="bi bi-whatsapp"></i></a>
                                    <a href="#" class="btn btn-light rounded-circle text-success me-2"
                                        style="width:40px;height:40px;display:inline-flex;align-items:center;justify-content:center;"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="#" class="btn btn-light rounded-circle text-success"
                                        style="width:40px;height:40px;display:inline-flex;align-items:center;justify-content:center;"><i
                                            class="bi bi-twitter-x"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

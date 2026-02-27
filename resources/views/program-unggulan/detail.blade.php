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

    <!-- Detail Hero Section -->
    <section class="position-relative mt-5 pt-3">
        <!-- Background Banner -->
        <div class="w-100 overflow-hidden" style="height: 400px; position: relative;">
            <div class="bg-dark position-absolute w-100 h-100 top-0 start-0" style="opacity: 0.6; z-index: 1;"></div>
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

    <!-- Detail Content -->
    <section class="py-5 bg-light pb-5 mb-5">
        <div class="container" style="margin-top: -60px; position: relative; z-index: 3;">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body p-4 p-md-5 bg-white">

                            <!-- Main Content Block -->
                            <div class="content article-body text-dark lh-lg fs-5" style="color: #444 !important;">
                                {!! $program->description !!}
                            </div>

                            <!-- Share & Return -->
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

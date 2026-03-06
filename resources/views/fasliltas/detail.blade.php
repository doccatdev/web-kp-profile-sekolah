@extends('layouts.layouts')

@php
    // Dummy Data untuk testing view
    $item = (object) [
        'image' => null,
        'description' =>
            '
            <p>Selamat datang di <strong>' .
            ($title ?? 'Fasilitas Kami') .
            '</strong>. Ini adalah deskripsi dummy. Fasilitas ini dibangun dengan standar modern untuk mendukung produktivitas dan kenyamanan maksimal.</p>
            <p>Admin dapat mengubah teks ini melalui dashboard. Gunakan teks editor untuk menambahkan list, tabel, atau gambar di dalam deskripsi ini.</p>
        ',
    ];
    $title = $title ?? 'Nama Fasilitas';
@endphp

@section('content')
    <section style="margin-top: 76px; background: #ffffff;">
        <div class="container-fluid p-0">
            <div class="row g-0 justify-content-center">
                <div class="col-12">

                    <div class="card border-0 shadow-none">
                        <div class="position-relative">
                            {{-- Image Cover Utama - Full View --}}
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/activity-02.jpg') }}"
                                class="w-100 object-fit-cover" style="height: 500px;" alt="{{ $title }}">

                            <div class="position-absolute bottom-0 start-0 w-100 h-50"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"></div>

                            <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white w-100">
                                <div class="container">
                                    <h1 class="fw-bold display-4 mb-0" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
                                        {{ $title }}
                                    </h1>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0 bg-white">
                            <div class="container py-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {{-- Konten Deskripsi dari Admin --}}
                                        <div class="description-content text-muted mb-5"
                                            style="line-height: 2; font-size: 1.15rem;">
                                            {!! $item->description !!}
                                        </div>

                                        {{-- Gallery Section --}}
                                        <div class="gallery-section mt-5 pt-5 border-top">
                                            <h3 class="fw-bold text-dark mb-4 text-center">Galeri Dokumentasi</h3>

                                            <div id="fasilitasGallery" class="carousel slide shadow-sm"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" data-bs-interval="3500">
                                                        <img src="{{ asset('assets/images/activity-01.jpg') }}"
                                                            class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                            alt="Galeri 1">
                                                    </div>
                                                    <div class="carousel-item" data-bs-interval="3500">
                                                        <img src="{{ asset('assets/images/activity-02.jpg') }}"
                                                            class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                            alt="Galeri 2">
                                                    </div>
                                                    <div class="carousel-item" data-bs-interval="3500">
                                                        <img src="{{ asset('assets/images/activity-03.jpg') }}"
                                                            class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                            alt="Galeri 3">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#fasilitasGallery" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon bg-dark p-3"
                                                        aria-hidden="true"></span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#fasilitasGallery" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon bg-dark p-3"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container pb-5 text-center">
                            <a href="{{ route('fasilitas.index') }}"
                                class="btn btn-outline-success rounded-pill px-5 shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Fasilitas
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

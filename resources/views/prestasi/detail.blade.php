@extends('layouts.layouts')

@section('content')
    {{-- Section Hero/Thumbnail --}}
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100 overflow-hidden">
            {{-- Menggunakan Ratio agar Hero Header selalu konsisten --}}
            <div class="ratio ratio-21x9 bg-dark d-flex align-items-center justify-content-center"
                style="min-height: 300px; max-height: 500px;">
                <img src="{{ asset('storage/' . $prestasi->thumbnail) }}"
                    class="w-100 h-100 object-fit-contain position-relative" style="z-index: 2;" alt="{{ $prestasi->judul }}">

                {{-- Background Blur untuk Hero --}}
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: url('{{ asset('storage/' . $prestasi->thumbnail) }}') center/cover no-repeat; filter: blur(15px) brightness(0.6); z-index: 1;">
                </div>
            </div>

            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start"
                style="z-index: 3;">
                <h1 class="text-white fw-bold display-6 mb-0">{{ $prestasi->judul }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container text-start">
            {{-- Meta Data Section --}}
            <div
                class="d-flex align-items-center flex-wrap gap-2 gap-md-3 mb-4 pb-3 border-bottom border-light text-muted small">
                <div class="d-flex flex-wrap align-items-center gap-3" style="font-size: 0.9rem;">
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-calendar-check me-2 text-success"></i>
                        <span>Dipublikasikan:
                            {{ \Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y') }}</span>
                    </span>
                    <span class="d-none d-md-inline text-muted">·</span>
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-tag me-2 text-success"></i>
                        <span>Jenis: {{ $prestasi->kategori_prestasi }}</span>
                    </span>
                    <span class="d-none d-md-inline text-muted">·</span>
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-trophy me-2 text-success"></i>
                        <span>Tingkat: {{ $prestasi->tingkat }}</span>
                    </span>
                </div>
            </div>

            <div class="body-text mb-5 detail-desc-body" style="line-height: 1.8; color: #475569; font-size: 1.05rem;">
                {!! $prestasi->konten !!}
            </div>

            {{-- Galeri Prestasi --}}
            @if ($prestasi->photos && $prestasi->photos->count() > 0)
                <div class="mt-5 pt-4 border-top border-light">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — {{ $prestasi->judul }}</h2>
                    <div id="prestasiGallery"
                        class="carousel slide rounded-3 border border-light overflow-hidden mb-4 shadow-sm"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($prestasi->photos as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="4000">

                                    {{-- Ganti class 'ratio' dengan div bertinggi tetap agar foto portrait lebih besar --}}
                                    <div class="position-relative d-flex align-items-center justify-content-center bg-dark"
                                        style="height: 500px;"> {{-- Sesuaikan tinggi ini, misal 480px atau 500px --}}

                                        {{-- 1. Gambar Utama --}}
                                        <img src="{{ asset('storage/' . $photo->foto) }}"
                                            class="d-block mh-100 mw-100 position-relative"
                                            style="object-fit: contain; z-index: 2;" alt="Galeri {{ $prestasi->judul }}">

                                        {{-- 2. Efek Blur Background --}}
                                        <div class="position-absolute top-0 start-0 w-100 h-100"
                                            style="background: url('{{ asset('storage/' . $photo->foto) }}') center/cover no-repeat; filter: blur(20px) brightness(0.7); z-index: 1;">
                                        </div>

                                        {{-- Caption --}}
                                        @if ($photo->caption)
                                            <div class="carousel-caption d-block" style="z-index: 3;">
                                                <div
                                                    class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill border border-light border-opacity-25">
                                                    <p class="mb-0 text-white small">{{ $photo->caption }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($prestasi->photos->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="prev" style="z-index: 4;">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="next" style="z-index: 4;">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                        @endif
                    </div>
            @endif

            <div class="mt-5 text-start">
                <a href="{{ route('prestasi.index') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar prestasi
                </a>
            </div>
        </div>
    </section>
@endsection

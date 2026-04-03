@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="{{ asset('storage/' . $prestasi->thumbnail) }}" class="detail-thumb-bg__img"
                    alt="{{ $prestasi->judul }}">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start"
                style="z-index: 2;">
                <h1 class="text-white fw-bold display-6 mb-0">{{ $prestasi->judul }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container text-start">
            <div
                class="d-flex align-items-center flex-wrap gap-2 gap-md-3 mb-4 pb-3 border-bottom border-light text-muted small">
                <div class="d-flex flex-wrap align-items-center gap-3" style="font-size: 0.9rem;">
                    {{-- Tanggal Posting --}}
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-calendar-check me-2 text-success"></i>
                        <span>Dipublikasikan:
                            {{ \Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y') }}</span>
                    </span>

                    <span class="d-none d-md-inline text-muted">·</span>

                    {{-- Jenis Prestasi --}}
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-tag me-2 text-success"></i>
                        <span>Jenis: {{ $prestasi->kategori_prestasi }}</span>
                    </span>

                    <span class="d-none d-md-inline text-muted">·</span>

                    {{-- Tingkat Prestasi --}}
                    <span class="d-inline-flex align-items-center">
                        <i class="bi bi-trophy me-2 text-success"></i>
                        <span>Tingkat: {{ $prestasi->tingkat }}</span>
                    </span>
                </div>
            </div>

            <div class="body-text mb-5 detail-desc-body" style="line-height: 1.8; color: #475569; font-size: 1.05rem;">
                {!! $prestasi->konten !!}
            </div>

            @if ($prestasi->photos && $prestasi->photos->count() > 0)
                <div class="mt-5 pt-4 border-top border-light">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — {{ $prestasi->judul }}</h2>
                    <div id="prestasiGallery" class="carousel slide rounded-3 border border-light overflow-hidden mb-4"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($prestasi->photos as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="4000">
                                    <img src="{{ asset('storage/' . $photo->foto) }}" class="d-block w-100 object-fit-cover"
                                        style="height: 480px;" alt="Galeri">

                                    @if ($photo->caption)
                                        <div class="carousel-caption d-block">
                                            <div class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                <p class="mb-0 text-white small">{{ $photo->caption }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        @if ($prestasi->photos->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="prev" aria-label="Sebelumnya">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery"
                                data-bs-slide="next" aria-label="Berikutnya">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25"
                                    aria-hidden="true"></span>
                            </button>
                        @endif
                    </div>
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

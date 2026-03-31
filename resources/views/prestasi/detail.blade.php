@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative; background-color: #000;">
            {{-- Background Masking --}}
            <div class="position-absolute w-100 h-50 bottom-0 start-0"
                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); z-index: 1;"></div>

            {{-- Banner --}}
            <img src="{{ asset('storage/' . $prestasi->thumbnail) }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $prestasi->judul }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <h1 class="text-white fw-bold display-5 mb-0">{{ $prestasi->judul }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    
                    {{-- INFO BAR: STYLE MINIMALIS --}}
                    <div class="d-flex align-items-center flex-wrap mb-4 text-secondary gap-3">
                        {{-- Tanggal Posting --}}
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-check me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Posting:</span>
                            <span>{{ \Carbon\Carbon::parse($prestasi->tanggal_posting)->format('d M Y') }}</span>
                        </div>
                        
                        {{-- Kategori Lomba --}}
                        <div class="d-flex align-items-center border-start ps-3 ms-1">
                            <i class="bi bi-tag-fill me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Kategori:</span>
                            <span>{{ $prestasi->kategori_prestasi }}</span>
                        </div>

                        {{-- Tingkat Prestasi --}}
                        <div class="d-flex align-items-center border-start ps-3 ms-1">
                            <i class="bi bi-trophy-fill me-2 text-success"></i>
                            <span class="small fw-bold text-uppercase text-muted me-1">Tingkat:</span>
                            <span>{{ $prestasi->tingkat }}</span>
                        </div>
                    </div>

                    {{-- Isi Konten --}}
                    <div class="body-text mb-5" style="line-height: 1.8; color: #444; font-size: 1.1rem; text-align: justify;">
                        {!! $prestasi->konten !!}
                    </div>

                    {{-- Galeri Foto --}}
                    @if($prestasi->photos && $prestasi->photos->count() > 0)
                    <div class="mt-5 pt-4 border-top">
                        {{-- Icon bi-images sudah dibuang --}}
                        <h5 class="fw-bold text-dark mb-4">Foto-Foto Prestasi {{ $prestasi->judul }}</h5>
                        <div id="prestasiGallery" class="carousel slide rounded-4 shadow-sm overflow-hidden mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($prestasi->photos as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="4000">
                                    <img src="{{ asset('storage/' . $photo->foto) }}" class="d-block w-100 object-fit-cover" style="height: 480px;" alt="Galeri">
                                    
                                    @if($photo->caption)
                                        <div class="carousel-caption d-block">
                                            <div class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                <p class="mb-0 text-white small">{{ $photo->caption }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>

                            @if($prestasi->photos->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                            </button>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="text-center mt-5">
                        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-success rounded-pill px-5 py-2 fw-bold">
                            <i class="bi bi-arrow-left me-2"></i>Kembali Ke Daftar Prestasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
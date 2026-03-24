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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('prestasi.index') }}" class="text-white text-decoration-none">Prestasi</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
                <h1 class="text-white fw-bold display-5">{{ $prestasi->judul }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="d-flex align-items-center flex-wrap mb-4 text-secondary gap-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-check me-2 text-success"></i>
                            <span>{{ \Carbon\Carbon::parse($prestasi->tanggal_prestasi)->format('d M Y') }}</span>
                        </div>
                        {{-- Menambahkan Info Kategori --}}
                        <div class="d-flex align-items-center border-start ps-3 ms-1 d-none d-md-flex">
                            <i class="bi bi-tag-fill me-2 text-success"></i>
                            <span>{{ $prestasi->kategori_prestasi }}</span>
                        </div>
                        <div class="d-flex align-items-center border-start ps-3 ms-1">
                            <i class="bi bi-layers-fill me-2 text-success"></i>
                            <span>Tingkat: <strong>{{ $prestasi->tingkat }}</strong></span>
                        </div>
                    </div>

                    {{-- Isi Konten --}}
                    <div class="body-text mb-5" style="line-height: 1.8; color: #444;">
                        {!! $prestasi->konten !!}
                    </div>

                    {{-- Galeri Foto Dinamis --}}
                    @if($prestasi->photos->count() > 0)
                    <div class="mt-5 pt-4 border-top">
                        <h5 class="fw-bold text-dark mb-4"><i class="bi bi-images me-2 text-success"></i>Galeri Foto Prestasi</h5>
                        <div id="prestasiGallery" class="carousel slide rounded-4 shadow overflow-hidden mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($prestasi->photos as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $photo->foto) }}" class="d-block w-100 object-fit-cover" style="height: 480px;" alt="Galeri {{ $index }}">
                                    @if($photo->caption)
                                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 py-2 px-3 mx-auto mb-3" style="width: fit-content;">
                                            <p class="mb-0 small">{{ $photo->caption }}</p>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>

                            @if($prestasi->photos->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiGallery" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiGallery" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="text-center mt-5 pt-4">
                        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-success rounded-pill px-5 py-2 fw-bold">
                            <i class="bi bi-arrow-left me-2"></i>Kembali Ke List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
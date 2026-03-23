@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="min-height: 400px; max-height: 550px; height: 60vh; position: relative;">

            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0,0,0,0) 50%); z-index: 1;">
            </div>

            <img src="{{ asset('storage/' . $ekskul->thumbnail) }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                style="object-position: center;"
                alt="{{ $ekskul->nama_ekskul }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none opacity-75 small">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ekstrakulikuler.index') }}" class="text-white text-decoration-none opacity-75 small">Ekstrakurikuler</a></li>
                        <li class="breadcrumb-item active text-white small" aria-current="page">Detail</li>
                    </ol>
                </nav>
                <h1 class="text-white fw-bold display-4 mb-0" data-aos="fade-up">{{ $ekskul->nama_ekskul }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="konten-isi mb-5">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 56px; height: 56px;">
                                <i class="bi bi-person-badge fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block fw-semibold text-uppercase" style="font-size: 0.75rem;">Guru Pembina</small>
                                <span class="fw-bold text-dark fs-5">{{ $ekskul->pembina }}</span>
                            </div>
                        </div>

                        <div class="text-secondary body-text" style="line-height: 1.9; text-align: justify; font-size: 1.1rem; color: #4b5563;">
                            {!! $ekskul->deskripsi_ekstrakulikuler !!}
                        </div>
                    </div>

                    @if ($ekskul->photos && $ekskul->photos->count() > 0)
                        <div class="galeri-section mt-5 pt-5 border-top">
                            <h4 class="fw-bold mb-4 text-center text-dark">Dokumentasi Kegiatan</h4>
                            <div id="ekskulGallery" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($ekskul->photos as $key => $photo)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="4000">
                                            <img src="{{ asset('storage/' . $photo->foto) }}"
                                                class="d-block w-100 object-fit-cover" style="height: 500px;"
                                                alt="{{ $photo->caption }}">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#ekskulGallery" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-50"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#ekskulGallery" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-50"></span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="text-center mt-5 pt-4">
                        <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-success rounded-pill px-5 py-2 fw-bold transition-up">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Ekskul
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

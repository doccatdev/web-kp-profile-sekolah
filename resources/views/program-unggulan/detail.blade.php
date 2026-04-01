@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="position-relative w-100">
            <div class="detail-thumb-bg w-100">
                <img src="{{ asset('storage/' . $program->thumbnail) }}" class="detail-thumb-bg__img"
                    alt="{{ $program->nama_program }}">
            </div>
            <div class="detail-thumb-bg__shade"></div>
            <div class="container position-absolute bottom-0 start-0 end-0 d-flex flex-column align-items-start justify-content-end pb-4 pb-md-5 px-3 text-start" style="z-index: 2;">
                <h1 class="fw-bold text-white display-5 mb-0" data-aos="fade-up">{{ $program->nama_program }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container text-start">
            <div class="article-content text-dark mb-5 detail-desc-body" style="line-height: 1.85;">
                {!! $program->deskripsi_program !!}
            </div>

            @if ($program->galleries->count() > 0)
                <div class="gallery-section mt-5">
                    <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — {{ $program->nama_program }}</h2>

                    <div id="programGallery" class="carousel slide overflow-hidden rounded-3 border border-light"
                        data-bs-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($program->galleries as $key => $galeri)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="3500">
                                    <img src="{{ asset('storage/' . $galeri->image) }}"
                                        class="d-block w-100 object-fit-cover" style="height: 500px;"
                                        alt="{{ $galeri->caption ?? 'Galeri ' . $program->nama_program }}">

                                    @if ($galeri->caption)
                                        <div class="carousel-caption d-block">
                                            <div class="d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                <p class="mb-0 text-white" style="font-size: 0.9rem;">{{ $galeri->caption }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#programGallery" data-bs-slide="prev" aria-label="Sebelumnya">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#programGallery" data-bs-slide="next" aria-label="Berikutnya">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="mt-5 pt-2 text-start">
                <a href="{{ url('/program-unggulan') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar program unggulan
                </a>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 400px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0" style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="{{ asset('storage/' . $program->thumbnail) }}" class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $program->nama_program }}">
            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <h1 class="fw-bold text-white display-4 mb-0" data-aos="fade-up">{{ $program->nama_program }}</h1>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="article-content text-dark mb-5 fs-5">
                        {!! $program->deskripsi_program !!}
                    </div>

                    @if($program->galleries && $program->galleries->count() > 0)
                    <div class="gallery-section mt-5">
                        <h4 class="fw-bold text-dark mb-4 d-flex align-items-center">
                            <span class="bg-success rounded-2 me-2" style="width: 12px; height: 24px;"></span>
                            Foto Kegiatan
                        </h4>
                        <div id="programGallery" class="carousel slide rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($program->galleries as $key => $galeri)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $galeri->image) }}" class="d-block w-100 object-fit-cover" style="height: 500px;" alt="Galeri">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#programGallery" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#programGallery" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="mt-5">
                        <a href="{{ route('program-unggulan.index') }}" class="btn btn-outline-success rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

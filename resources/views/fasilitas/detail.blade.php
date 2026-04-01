@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 76px; background: #ffffff;">
        <div class="container-fluid p-0">
            <div class="card border-0 shadow-none">
                <div class="position-relative">
                    <div class="detail-thumb-bg w-100">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="detail-thumb-bg__img"
                            alt="{{ $item->nama_fasilitas }}">
                    </div>
                    <div class="detail-thumb-bg__shade"></div>
                    <div class="position-absolute bottom-0 start-0 end-0 p-4 p-md-5 text-white w-100 text-start" style="z-index: 2;">
                        <div class="container px-0 px-md-2">
                            <h1 class="fw-bold display-5 mb-0">{{ $item->nama_fasilitas }}</h1>
                        </div>
                    </div>
                </div>

                <div class="container py-5 text-start">
                    <div class="description-content text-muted mb-5 detail-desc-body" style="line-height: 1.85; font-size: 1.05rem;">
                        {!! $item->deskripsi_fasilitas !!}
                    </div>

                    @if ($item->galeri->count() > 0)
                        <div class="gallery-section mt-5 pt-5 border-top border-light">
                            <h2 class="h5 fw-semibold text-dark mb-3 text-start">Galeri — {{ $item->nama_fasilitas }}</h2>
                            <div id="fasilitasGallery" class="carousel slide rounded-3 overflow-hidden border border-light" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($item->galeri as $key => $g)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $g->image) }}"
                                                class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                alt="Gallery">
                                            @if ($g->caption)
                                                <div class="carousel-caption d-block">
                                                    <div class="text-center d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                        <p class="m-0 text-white" style="font-size: 0.9rem;">
                                                            {{ $g->caption }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="prev" aria-label="Sebelumnya">
                                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="next" aria-label="Berikutnya">
                                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-25" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="mt-5 text-start">
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke daftar fasilitas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

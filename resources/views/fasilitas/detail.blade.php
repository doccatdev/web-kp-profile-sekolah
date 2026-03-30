@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 76px; background: #ffffff;">
        <div class="container-fluid p-0">
            <div class="card border-0 shadow-none">
                <div class="position-relative">
                    {{-- Thumbnail Utama --}}
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-100 object-fit-cover" style="height: 500px;"
                        alt="{{ $item->nama_fasilitas }}">

                    <div class="position-absolute bottom-0 start-0 w-100 h-50"
                        style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"></div>
                    <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white w-100">
                        <div class="container">
                            <h1 class="fw-bold display-4 mb-0">{{ $item->nama_fasilitas }}</h1>
                        </div>
                    </div>
                </div>

                <div class="container py-5">
                    <div class="description-content text-muted mb-5" style="line-height: 2; font-size: 1.15rem;">
                        {!! $item->deskripsi_fasilitas !!}
                    </div>

                    {{-- Carousel Galeri --}}
                    @if ($item->galeri->count() > 0)
                        <div class="gallery-section mt-5 pt-5 border-top">
                            <h3 class="fw-bold text-dark mb-4 text-center">Foto-Foto Fasilitas {{ $item->nama_fasilitas }}
                            </h3>
                            <div id="fasilitasGallery" class="carousel slide shadow-sm" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($item->galeri as $key => $g)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $g->image) }}"
                                                class="d-block w-100 object-fit-cover" style="height: 550px;"
                                                alt="Gallery">
                                            @if ($g->caption)
                                                <div class="carousel-caption d-block">
                                                    {{-- Penjelasan Class: text-center (tengah), d-inline-block (lebar ikut teks), bg-dark bg-opacity-50 (hitam transparan), px-4 py-1 (jarak teks), rounded-pill (sudut bulat penuh) --}}
                                                    <div
                                                        class="text-center d-inline-block bg-dark bg-opacity-50 px-4 py-1 rounded-pill">
                                                        <p class="m-0 text-white" style="font-size: 0.9rem;">
                                                            {{ $g->caption }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#fasilitasGallery"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="text-center mt-5">
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-outline-success rounded-pill px-5">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Fasilitas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

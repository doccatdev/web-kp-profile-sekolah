@extends('layouts.layouts')

@section('content')
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold" data-aos="fade-down">Sarana & Prasarana</h1>
            <p class="lead mb-0 opacity-75" data-aos="fade-up">Fasilitas modern untuk mendukung pembelajaran siswa</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                @forelse ($fasilitas as $f)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden">
                            {{-- 1. Tambahkan Thumbnail di Bagian Atas Card --}}
                            <div class="ratio ratio-16x9 bg-light">
                                <img src="{{ asset('storage/' . $f->thumbnail) }}" class="object-fit-cover"
                                    alt="{{ $f->nama_fasilitas }}">

                                {{-- Badge Icon di pojok foto agar tetap terlihat modern --}}
                                <div class="position-absolute top-0 start-0 m-3">
                                    <div class="bg-white text-success rounded-3 d-flex align-items-center justify-content-center shadow-sm"
                                        style="width:40px;height:40px;">
                                        <i class="{{ $f->icon_class ?? 'bi bi-building' }} fs-5"></i>
                                    </div>
                                </div>
                            </div>

                            {{-- 2. Bagian Konten Card --}}
                            <div class="card-body p-4 d-flex flex-column">
                                <h4 class="fw-bold mb-2">{{ $f->nama_fasilitas }}</h4>
                                <p class="text-muted mb-4 flex-grow-1" style="font-size: 0.95rem;">
                                    {{ Str::limit($f->deskripsi_singkat, 100) }}
                                </p>

                                <a href="{{ route('fasilitas.detail', $f->slug) }}"
                                    class="btn btn-emerald w-100 rounded-pill mt-auto">
                                    Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-8 text-center py-5" data-aos="fade-up">
                        <div class="mb-4">
                            <i class="bi bi-info-circle display-1 text-muted opacity-25"></i>
                        </div>
                        <h3 class="fw-bold text-dark">Data Belum Tersedia</h3>
                        <p class="text-muted">Informasi sedang dalam tahap pembaruan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $item->news_title }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita.index') }}"
                                class="text-white text-decoration-none">Berita</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                {{-- Main Content Kiri --}}
                <div class="col-lg-8 pe-lg-5">
                    <div class="bg-white p-0">
                        <div class="konten-berita">
                            {{-- 1. Judul --}}
                            <h2 class="fw-bold mb-3" data-aos="fade-up">{{ $item->news_title }}</h2>

                            {{-- 2. Baris Icon (Dipublikasikan & Kategori) - STATIC VERSION (Tidak Ikut Scroll) --}}
                            <div class="d-flex align-items-center flex-wrap mb-4 text-secondary bg-white py-3 border-bottom"
                                style="gap: 20px; font-size: 0.95rem;" data-aos="fade-up" data-aos-delay="100">

                                {{-- Icon Jam/Kalender --}}
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-calendar-check me-2 text-success"
                                        style="font-size: 1.1rem;"></i>
                                    <span>Dipublikasikan:
                                        <strong>{{ $item->posted_at->locale('id')->translatedFormat('j F Y') }}</strong></span>
                                </div>

                                {{-- Icon Kategori --}}
                                @if ($item->category)
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-layer-group me-2 text-success" style="font-size: 1.1rem;"></i>
                                        <span>Kategori:
                                            <a href="{{ route('berita.index', ['category' => $item->category->slug]) }}"
                                                class="text-decoration-none fw-bold text-success">
                                                {{ $item->category->name_category }}
                                            </a>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- 3. Isi Konten --}}
                            <div class="text-secondary mb-5" style="line-height: 1.8; text-align: justify;"
                                data-aos="fade-up" data-aos-delay="200">
                                {!! $item->news_content !!}
                            </div>

                            {{-- 4. Komentar --}}
                            <div class="komentar-section mt-5 pt-4 border-top" data-aos="fade-up">
                                <h4 class="fw-bold mb-4">Komentar</h4>

                                {{-- Form Komentar --}}
                                <div class="mb-5">
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control p-3 bg-light border-0"
                                                    placeholder="Nama Lengkap*" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="email" class="form-control p-3 bg-light border-0"
                                                    placeholder="Email*" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control p-3 bg-light border-0" rows="4" placeholder="Tulis komentar Anda di sini...*"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success px-4 py-2">Kirim Komentar</button>
                                    </form>
                                </div>

                                {{-- Daftar Komentar --}}
                                <div class="d-flex mb-4">
                                    <img src="{{ asset('assets/images/default-avatar.png') }}"
                                        class="rounded-circle border me-3"
                                        style="width: 50px; height: 50px; object-fit: cover; opacity: 0.5;" alt="User">
                                    <div>
                                        <h6 class="fw-bold mb-1">Ahmad Santoso</h6>
                                        <span class="text-muted small d-block mb-2">12 Agustus 2026</span>
                                        <p class="text-secondary mb-0">Informasi yang sangat bermanfaat! Sukses selalu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar Kanan (Berita Lainnya) - STICKY (Tetap di atas saat scroll) --}}
                <div class="col-lg-4">
                    <div class="berita-lainnya-section mt-5 mt-lg-0 sticky-top" style="top: 100px; z-index: 10;"
                        data-aos="fade-left" data-aos-delay="200">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                            <h5 class="fw-bold mb-0">Berita Lainnya</h5>
                            <a href="{{ route('berita.index') }}"
                                class="text-success text-decoration-none fw-bold small">Lihat Semua <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4" style="height: 100px;">
                                            <img src="{{ asset('assets/images/il-berita-0' . ($i > 3 ? 1 : $i) . '.png') }}"
                                                class="w-100 h-100 object-fit-cover" alt="Berita Terkait">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-3 bg-white">
                                                <h6 class="card-title fw-bold mb-2 text-truncate-2"
                                                    style="font-size: 0.85rem; line-height: 1.4;">
                                                    <a href="#" class="text-dark text-decoration-none">Judul Berita
                                                        Menarik Lainnya...</a>
                                                </h6>
                                                <div class="text-muted small">
                                                    <i class="fa-regular fa-calendar me-1"></i>
                                                    {{ date('d F Y', strtotime('-' . $i . ' days')) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

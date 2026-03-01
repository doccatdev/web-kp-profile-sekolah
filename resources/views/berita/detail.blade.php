@extends('layouts.layouts')

@section('content')
    <!-- Detail Hero Section -->
    <section class="position-relative" style="margin-top: 76px;">
        <!-- Background Banner -->
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
        </div>
        </div>
        </div>
    </section>

    <!-- Detail Content -->
    <section class="py-5 bg-light pb-5 mb-5">
        <div class="container" style="margin-top: -80px; position: relative; z-index: 3;">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body p-4 p-md-5 bg-white">
                            <div class="konten-berita">
                                {{-- 1. Judul --}}
                                <h2 class="fw-bold mb-3">{{ $item->news_title }}</h2>

                                {{-- 2. Baris Icon (Dipublikasikan & Kategori) STICKY VERSION --}}
                                {{-- Penjelasan: sticky-top akan membuatnya menempel, top: 80px disesuaikan agar tidak tertutup Navbar --}}
                                <div class="d-flex align-items-center flex-wrap mb-4 text-secondary shadow-sm bg-white py-3"
                                    style="gap: 20px; font-size: 0.95rem; position: sticky; top: 90px; z-index: 1000; border-bottom: 1px solid #eee;">

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
                                            <i class="fa-solid fa-layer-group me-2 text-success"
                                                style="font-size: 1.1rem;"></i>
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
                                <div class="text-secondary" style="line-height: 1.8; text-align: justify;">
                                    {!! $item->news_content !!}
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
@endsection

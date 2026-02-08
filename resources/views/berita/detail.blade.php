@extends('layouts.layouts')

@section('content')
    <section id="detail-berita" style="margin-top: 100px;" class="py-5">
        <div class="container">
            <div class="container col-xxl-8">
                {{-- Breadcrumb --}}
                <div class="mb-3">
                    <a href="{{ route('berita.index') }}" class="text-decoration-none text-secondary">Home</a> &gt;
                    <a href="{{ route('berita.index') }}" class="text-decoration-none text-secondary">Berita</a> &gt;
                    {{ $item->news_title }}
                </div>

                {{-- Image --}}
                <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('assets/images/il-berita-01.png') }}" class="img-fluid mb-3" alt="{{ $item->news_title }}" style="border-radius: 10px; width: 100%;">

                <div class="konten-berita">
                    {{-- 1. Judul --}}
                    <h2 class="fw-bold mb-3">{{ $item->news_title }}</h2>

                    {{-- 2. Baris Icon (Dipublikasikan & Kategori) STICKY VERSION --}}
                    {{-- Penjelasan: sticky-top akan membuatnya menempel, top: 80px disesuaikan agar tidak tertutup Navbar --}}
                    <div class="d-flex align-items-center flex-wrap mb-4 text-secondary shadow-sm bg-white py-3"
                         style="gap: 20px; font-size: 0.95rem; position: sticky; top: 90px; z-index: 1000; border-bottom: 1px solid #eee;">

                        {{-- Icon Jam/Kalender --}}
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-calendar-check me-2 text-success" style="font-size: 1.1rem;"></i>
                            <span>Dipublikasikan: <strong>{{ $item->posted_at->locale('id')->translatedFormat('j F Y') }}</strong></span>
                        </div>

                        {{-- Icon Kategori --}}
                        @if($item->category)
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-layer-group me-2 text-success" style="font-size: 1.1rem;"></i>
                            <span>Kategori:
                                <a href="{{ route('berita.index', ['category' => $item->category->slug]) }}" class="text-decoration-none fw-bold text-success">
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

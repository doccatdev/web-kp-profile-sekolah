@extends('layouts.layouts')

@section('content')
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 400px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent); z-index: 1;"></div>

            {{-- Mengambil thumbnail asli dari database --}}
            <img src="{{ Storage::url($item->thumbnail) }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                alt="{{ $item->judul_pengumuman }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-4" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}" class="text-white text-decoration-none">Pengumuman</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
                <h2 class="text-white fw-bold">{{ $item->judul_pengumuman }}</h2>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-4 text-muted" style="gap: 15px;">
                        <span><i class="fa-regular fa-calendar me-1 text-success"></i> {{ $item->posted_at->translatedFormat('d F Y') }}</span>
                        <span><i class="bi bi-tags-fill text-success"></i> {{ $item->category->name_category }}</span>
                    </div>

                    <div class="content-body" style="line-height: 1.8; color: #374151;">
                        {{-- Output HTML dari RichEditor --}}
                        {!! $item->isi_pengumuman !!}
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-success rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

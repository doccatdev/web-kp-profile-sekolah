@extends('layouts.layouts')

@section('content')
<section id="video" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Video</h1>
            <p class="text-muted">Video Kegiatan SMP Al Husainiyah</p>
        </div>
        @if(isset($videos) && count($videos) > 0)
            {{-- Nanti: loop data dari Filament CRUD --}}
            <div class="row g-4 py-4">
                @foreach($videos as $video)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card border-0 shadow-sm h-100">
                        @if($video->thumbnail ?? null)
                            <img src="{{ asset('storage/' . $video->thumbnail) }}" class="card-img-top" alt="{{ $video->judul ?? 'Video' }}">
                        @else
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-play-circle text-white" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $video->judul ?? 'Video' }}</h5>
                            @if($video->deskripsi ?? null)
                                <p class="card-text text-muted small">{{ Str::limit($video->deskripsi, 80) }}</p>
                            @endif
                            @if($video->url ?? null)
                                <a href="{{ $video->url }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">Tonton</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            {{-- Placeholder sampai data dari backend/Filament tersedia --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5 text-center text-muted">
                            <p class="mb-0">Daftar video akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@extends('layouts.layouts')

@section('content')
<section id="foto-kegiatan" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Foto Kegiatan</h1>
            <p class="text-muted">Galeri Kegiatan SMP Al Husainiyah</p>
        </div>

        @if(isset($fotos) && count($fotos) > 0)
            {{-- Nanti: loop data dari Filament CRUD (judul, gambar, tanggal, deskripsi, dll) --}}
            <div class="row g-4 py-4">
                @foreach($fotos as $foto)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        @if($foto->gambar ?? null)
                            <img src="{{ asset('storage/' . $foto->gambar) }}" class="card-img-top img-fluid" alt="{{ $foto->judul ?? 'Foto kegiatan' }}" style="object-fit: cover; height: 250px;">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="bi bi-image text-white" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($foto->judul ?? null)
                                <h5 class="card-title fw-bold">{{ $foto->judul }}</h5>
                            @endif
                            @if($foto->tanggal ?? null)
                                <p class="text-muted small mb-1">{{ \Carbon\Carbon::parse($foto->tanggal)->translatedFormat('d F Y') }}</p>
                            @endif
                            @if($foto->deskripsi ?? null)
                                <p class="card-text text-muted small">{{ Str::limit($foto->deskripsi, 80) }}</p>
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
                            <i class="bi bi-images mb-3" style="font-size: 3rem;"></i>
                            <p class="mb-0">Daftar foto kegiatan akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@extends('layouts.layouts')

@section('content')
<section id="ekstrakulikuler" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Ekstrakulikuler</h1>
            <p class="text-muted">Kegiatan Ekstrakulikuler SMP Al Husainiyah</p>
        </div>

        @if(isset($ekstrakulikuler) && count($ekstrakulikuler) > 0)
            {{-- Nanti: loop data dari Filament CRUD (nama, gambar, deskripsi, dll) --}}
            <div class="row g-4 py-4">
                @foreach($ekstrakulikuler as $ekstra)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        @if($ekstra->gambar ?? null)
                            <img src="{{ asset('storage/' . $ekstra->gambar) }}" class="card-img-top img-fluid" alt="{{ $ekstra->nama ?? 'Ekstrakulikuler' }}" style="object-fit: cover; height: 250px;">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="bi bi-people text-white" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($ekstra->nama ?? null)
                                <h5 class="card-title fw-bold">{{ $ekstra->nama }}</h5>
                            @endif
                            @if($ekstra->deskripsi ?? null)
                                <p class="card-text text-muted small">{{ Str::limit($ekstra->deskripsi, 100) }}</p>
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
                            <i class="bi bi-people mb-3" style="font-size: 3rem;"></i>
                            <p class="mb-0">Daftar ekstrakulikuler akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

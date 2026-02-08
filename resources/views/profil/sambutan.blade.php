@extends('layouts.layouts')

@section('content')
<section id="sambutan" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Sambutan</h1>
            <p class="text-muted">Sambutan Kepala Sekolah SMP Al Husainiyah</p>
        </div>
        <div class="content-section" data-aos="fade-up">
            @if(isset($sambutan) && $sambutan)
                {{-- Nanti: data dari Filament CRUD --}}
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        @if($sambutan->foto ?? null)
                            <img src="{{ asset('storage/' . $sambutan->foto) }}" class="img-fluid rounded mb-4" alt="Kepala Sekolah">
                        @endif
                        <div class="konten-profil">
                            <h4 class="fw-bold mb-3">{{ $sambutan->judul ?? 'Sambutan' }}</h4>
                            <div class="body-text">
                                {!! $sambutan->konten ?? '' !!}
                            </div>
                            @if($sambutan->nama ?? null)
                                <p class="mt-4 fw-semibold">{{ $sambutan->nama }}</p>
                                <p class="text-muted">{{ $sambutan->jabatan ?? 'Kepala Sekolah' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                {{-- Placeholder sampai data dari backend/Filament tersedia --}}
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5 text-center text-muted">
                                <p class="mb-0">Konten sambutan akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

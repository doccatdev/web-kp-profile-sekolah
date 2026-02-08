@extends('layouts.layouts')

@section('content')
<section id="profil-sekolah" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Profil Sekolah</h1>
            <p class="text-muted">Profil SMP Al Husainiyah</p>
        </div>
        <div class="content-section" data-aos="fade-up">
            @if(isset($profil) && $profil)
                {{-- Nanti: data dari Filament CRUD --}}
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="konten-profil">
                            <h4 class="fw-bold mb-3">{{ $profil->judul ?? 'Profil Sekolah' }}</h4>
                            <div class="body-text">
                                {!! $profil->konten ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5 text-center text-muted">
                                <p class="mb-0">Konten profil sekolah akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

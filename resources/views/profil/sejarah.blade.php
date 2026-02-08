@extends('layouts.layouts')

@section('content')
<section id="sejarah" class="pt-5">
    <div class="container py-5">
        <div class="header-section text-center mb-5">
            <h1 class="fw-bold">Sejarah</h1>
            <p class="text-muted">Sejarah SMP Al Husainiyah</p>
        </div>
        <div class="content-section" data-aos="fade-up">
            @if(isset($sejarah) && $sejarah)
                {{-- Nanti: data dari Filament CRUD --}}
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="konten-profil">
                            <h4 class="fw-bold mb-3">{{ $sejarah->judul ?? 'Sejarah' }}</h4>
                            <div class="body-text">
                                {!! $sejarah->konten ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5 text-center text-muted">
                                <p class="mb-0">Konten sejarah akan ditampilkan di sini setelah diisi melalui panel admin (Filament).</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

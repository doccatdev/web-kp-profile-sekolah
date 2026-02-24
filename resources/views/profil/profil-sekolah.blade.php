@extends('layouts.layouts')

@section('content')
    <section id="profil-sekolah" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5">
                <h1 class="fw-bold">Profil Sekolah</h1>
                <p class="text-muted">Profil SMP Al Husainiyah</p>
            </div>

            {{-- Image Carousel Profil Sekolah --}}
            @if (isset($profilPhotos) && $profilPhotos->count() > 0)
                <div class="mb-5" data-aos="fade-up">
                    <div id="carouselProfil" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($profilPhotos as $index => $photo)
                                <button type="button" data-bs-target="#carouselProfil"
                                    data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner rounded shadow">
                            @foreach ($profilPhotos as $index => $photo)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $photo->image) }}" class="d-block w-100"
                                        alt="{{ $photo->title ?? 'Foto Profil Sekolah' }}"
                                        style="height: 450px; object-fit: cover;">
                                    @if ($photo->title || $photo->caption)
                                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                            @if ($photo->title)
                                                <h5 class="fw-bold mb-1">{{ $photo->title }}</h5>
                                            @endif
                                            @if ($photo->caption)
                                                <p class="mb-0">{{ $photo->caption }}</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProfil"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselProfil"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Konten Profil --}}
            <div class="content-section" data-aos="fade-up">
                @if (isset($profil) && $profil)
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
                                    <p class="mb-0">Konten profil sekolah akan ditampilkan di sini setelah diisi melalui
                                        panel admin (Filament).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #009b4d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Tentang Kami</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Profil Sekolah</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Mengenal lebih dekat lingkungan dan profil SMP Al Husainiyah.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
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

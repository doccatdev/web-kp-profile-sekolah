@extends('layouts.layouts')

@section('content')
<!-- Hero -->
<section id="hero">
    <div class="container text-center text-white">
        <div class="hero-title" data-aos="fade-up">
            <h1 class="hero-text">Selamat Datang <br> di SMP Al Husainiyah</h1>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- Slogan -->
<section id="slogan" style="margin-top: -35px;">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 shadow-sm p-3 mb-5 bg-body rounded">
                    <h4>Cerdas</h4>
                </div>
            </div>
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm p-3 mb-5 bg-body rounded">
                    <h4>Berkarakter</h4>
                </div>
            </div>
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm p-3 mb-5 bg-body rounded">
                    <h4>Religus</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Slogan -->

<!-- Berita -->
<section id="berita">
    <div class="container py-5">
        <div class="header-berita text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Berita</h2>
            <hr class="mx-auto"> </div>

        <div class="row py-5">
            @forelse($news as $item)
                <div class="col-lg-4 mb-4" data-aos="fade-up">
                    <div class="card card-news border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('assets/images/il-berita-01.png') }}"
                                 class="card-img-top"
                                 alt="{{ $item->news_title }}">

                            @if($item->category)
                                <span class="position-absolute top-0 start-0 m-3 badge bg-danger category-badge shadow-sm">
                                    {{ $item->category->name_category }}
                                </span>
                            @endif
                        </div>

                        <div class="card-body p-4">
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $item->posted_at->locale('id')->translatedFormat('j F Y') }}
                                </small>
                            </div>

                            <h5 class="fw-bold mb-3">
                                <a href="{{ route('berita.show', $item->slug) }}" class="text-decoration-none text-dark lh-base">
                                    {{ \Illuminate\Support\Str::limit($item->news_title, 50) }}
                                </a>
                            </h5>

                            <p class="text-muted small mb-4 text-excerpt">
                                {{ $item->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($item->news_content), 100) }}
                            </p>

                            <a href="{{ route('berita.show', $item->slug) }}" class="btn-selengkapnya text-decoration-none text-danger fw-bold small text-uppercase">
                                Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>

        <div class="footer-berita text-center">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-danger px-4 rounded-pill">Berita Lainnya</a>
        </div>
    </div>
</section>
<!-- End Berita -->

<!-- Video -->
<section id="video" class="py-5">
    <div class="header-video text-center" data-aos="fade-up">
        <h2 class="fw-bold">Video</h2>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8" data-aos="zoom-in">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.youtube.com/embed/5y4nlbwhAgE?si=rQ4a0yIKydBblYti"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="/video" class="btn btn-outline-danger">Video Lainnya</a>
        </div>
    </div>
</section>
<!-- End Video -->

<!-- Foto -->
<section id="foto" class="section-photo parallax">
    <div class="container text-center">
        <div class="mb-5" data-aos="fade-up">
            <div class="stripe-hijau mx-auto" style="width: 100px;"></div>
            <h5 class="fw-bold text-white">Galeri Foto</h5>
        </div>
        <div class="row justify-content-center g-3" data-aos="fade-up" data-aos-delay="100">
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="mt-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/galeri') }}" class="btn btn-outline-danger">Foto Lainnya</a>
        </div>
    </div>
</section>
<!-- End Foto Kegiatan -->

<!-- Foto Ekstrakulikuler -->
<section id="ekstrakulikuler" class="py-5 bg-white">
    <div class="container text-center py-5">
        <div class="mb-5" data-aos="fade-up">
            <div class="stripe-hijau mx-auto mb-2" style="width: 100px;"></div>
            <h2 class="fw-bold">Ekstrakulikuler</h2>
            <p class="text-muted">Kegiatan ekstrakulikuler SMP Al Husainiyah</p>
        </div>
        <div class="row justify-content-center g-3" data-aos="fade-up" data-aos-delay="100">
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid rounded" alt="Ekstrakulikuler">
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid rounded" alt="Ekstrakulikuler">
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('assets/images/activity-01.jpg') }}" class="img-fluid rounded" alt="Ekstrakulikuler">
            </div>
        </div>
        <div class="mt-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/galeri/ekstrakulikuler') }}" class="btn btn-outline-danger">Lihat Ekstrakulikuler</a>
        </div>
    </div>
</section>
<!-- End Foto Ekstrakulikuler -->

<!-- Fasilitas -->
<!-- End Fasilitas -->
@endsection

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

    <!-- Program Unggulan -->
    <section id="program-unggulan" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Program Unggulan</h2>
                <div class="stripe-red mx-auto"
                    style="width: 100px; height: 4px; background-color: #dc3545; margin-top: 10px;"></div>
                <p class="text-muted mt-3">Program unggulan SMP Al Husainiyah untuk mencetak generasi berkualitas</p>
            </div>

            @if (isset($flagshipPrograms) && $flagshipPrograms->count() > 0)
                {{-- Dynamic Carousel dari database --}}
                <div id="carouselProgram" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in">
                    <div class="carousel-indicators">
                        @foreach ($flagshipPrograms as $index => $program)
                            <button type="button" data-bs-target="#carouselProgram" data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner rounded shadow-sm">
                        @foreach ($flagshipPrograms as $index => $program)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg') }}"
                                    class="d-block w-100" alt="{{ $program->title }}"
                                    style="height: 500px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                    <h5 class="fw-bold">{{ $program->title }}</h5>
                                    <p class="mb-2">{{ Str::limit(strip_tags($program->description), 120) }}</p>
                                    <a href="{{ route('program-unggulan.show', $program->id) }}"
                                        class="btn btn-sm btn-danger">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProgram"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProgram"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                {{-- Fallback static carousel ketika data belum diisi --}}
                <div id="carouselProgram" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselProgram" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselProgram" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselProgram" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner rounded shadow-sm">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/activity-01.jpg') }}" class="d-block w-100"
                                alt="Program Unggulan 1" style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Program Tahfidz Al-Qur'an</h5>
                                <p>Membentuk generasi penghafal Al-Qur'an yang berakhlak mulia.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/activity-02.jpg') }}" class="d-block w-100"
                                alt="Program Unggulan 2" style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Program Bilingual</h5>
                                <p>Penguasaan bahasa asing (Arab & Inggris) untuk menghadapi tantangan global.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/activity-03.jpg') }}" class="d-block w-100"
                                alt="Program Unggulan 3" style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Sains & Teknologi</h5>
                                <p>Pengembangan minat dan bakat di bidang sains dan teknologi informasi.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProgram"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProgram"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <!-- End Program Unggulan -->

    <!-- Ekstrakulikuler -->
    <section id="ekstrakulikuler" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Ekstrakulikuler</h2>
                <div class="stripe-red mx-auto"
                    style="width: 100px; height: 4px; background-color: #dc3545; margin-top: 10px;"></div>
                <p class="text-muted mt-3">Wadah pengembangan bakat dan minat siswa</p>
            </div>

            @if (isset($extracurriculars) && $extracurriculars->count() > 0)
                {{-- Dynamic Carousel dari database --}}
                <div id="carouselEkskul" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in">
                    <div class="carousel-indicators">
                        @foreach ($extracurriculars as $index => $ekskul)
                            <button type="button" data-bs-target="#carouselEkskul"
                                data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner rounded shadow-sm">
                        @foreach ($extracurriculars as $index => $ekskul)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $ekskul->image ? asset('storage/' . $ekskul->image) : asset('assets/images/activity-03.jpg') }}"
                                    class="d-block w-100" alt="{{ $ekskul->title }}"
                                    style="height: 500px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                    <h5 class="fw-bold">{{ $ekskul->title }}</h5>
                                    <p class="mb-0">{{ Str::limit(strip_tags($ekskul->description), 120) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEkskul"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselEkskul"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                {{-- Fallback static carousel --}}
                <div id="carouselEkskul" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselEkskul" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselEkskul" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselEkskul" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner rounded shadow-sm">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/activity-03.jpg') }}" class="d-block w-100" alt="Ekskul 1"
                                style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Pramuka</h5>
                                <p>Membentuk karakter disiplin, mandiri, dan cinta tanah air.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/activity-01.jpg') }}" class="d-block w-100" alt="Ekskul 2"
                                style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Pencak Silat</h5>
                                <p>Melestarikan budaya bangsa dan menjaga kesehatan fisik.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/activity-02.jpg') }}" class="d-block w-100" alt="Ekskul 3"
                                style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                <h5 class="fw-bold">Hadroh</h5>
                                <p>Seni musik Islami untuk meningkatkan kecintaan kepada Nabi Muhammad SAW.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEkskul"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselEkskul"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <!-- End Ekstrakulikuler -->
@endsection

@extends('layouts.layouts')

@section('content')
    <section id="ekstrakulikuler-page" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold">Ekstrakulikuler</h1>
                <p class="text-muted">Wadah pengembangan bakat dan minat siswa SMP Al Husainiyah</p>
                <div class="stripe-red mx-auto"
                    style="width: 100px; height: 4px; background-color: #dc3545; margin-top: 10px;"></div>
            </div>

            @if (isset($extracurriculars) && $extracurriculars->count() > 0)
                <div class="row g-4">
                    @foreach ($extracurriculars as $ekskul)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="card border-0 shadow-sm h-100 card-ekskul">
                                @if ($ekskul->image)
                                    <img src="{{ asset('storage/' . $ekskul->image) }}" class="card-img-top"
                                        alt="{{ $ekskul->title }}" style="height: 220px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/images/activity-03.jpg') }}" class="card-img-top"
                                        alt="{{ $ekskul->title }}" style="height: 220px; object-fit: cover;">
                                @endif
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3">{{ $ekskul->title }}</h5>
                                    <div class="text-muted small">
                                        {!! Str::limit(strip_tags($ekskul->description), 150) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5 text-center text-muted">
                                <i class="bi bi-trophy-fill fs-1 mb-3 d-block text-success"></i>
                                <p class="mb-0">Data ekstrakulikuler akan ditampilkan di sini setelah diisi melalui panel
                                    admin (Filament).</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

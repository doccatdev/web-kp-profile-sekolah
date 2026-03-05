@extends('layouts.layouts')

@section('content')
    @php
        if (!isset($ekskul) && !isset($extracurriculars)) {
            $extracurriculars = collect([
                (object) [
                    'id' => 'pencak-silat',
                    'title' => 'Pencak Silat',
                    'image' => null,
                    'description' => 'Seni bela diri tradisional Indonesia untuk melatih fisik dan mental siswa.',
                ],
                (object) [
                    'id' => 'futsal',
                    'title' => 'Futsal',
                    'image' => null,
                    'description' => 'Olahraga beregu yang melatih kerja sama tim dan sportivitas.',
                ],
                (object) [
                    'id' => 'pramuka',
                    'title' => 'Pramuka',
                    'image' => null,
                    'description' => 'Membentuk karakter disiplin, mandiri, dan cinta alam.',
                ],
            ]);
        } elseif (isset($ekskul) && !isset($extracurriculars)) {
            $extracurriculars = $ekskul; // handle old variable name gracefully
        }
    @endphp
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #009b4d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Pengembangan Bakat</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Ekstrakurikuler</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Wadah pengembangan bakat, minat, dan potensi siswa SMP Al-Husainiyyah di luar jam pelajaran.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section id="ekstrakulikuler-page" class="py-5 bg-light">
        <div class="container py-4">
            @if (isset($extracurriculars) && $extracurriculars->count() > 0)
                <div class="row g-4">
                    @foreach ($extracurriculars as $ekskul)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                                style="cursor:pointer;">
                                @if ($ekskul->image)
                                    <img src="{{ asset('storage/' . $ekskul->image) }}" class="w-100 object-fit-cover"
                                        alt="{{ $ekskul->title }}" style="height: 350px;">
                                @else
                                    <img src="{{ asset('assets/images/activity-03.jpg') }}" class="w-100 object-fit-cover"
                                        alt="{{ $ekskul->title }}" style="height: 350px;">
                                @endif
                                <div class="ig-overlay"></div>
                                <div class="position-absolute bottom-0 start-0 p-4 text-white"
                                    style="z-index:2; width: 100%;">
                                    <div class="d-flex flex-column justify-content-end h-100">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                                    class="bi bi-star-fill fs-5"></i></div>
                                            <span class="badge bg-success bg-opacity-75 rounded-pill small">Giat
                                                Ekskul</span>
                                        </div>
                                        <h5 class="fw-bold mb-1">{{ $ekskul->title }}</h5>
                                        <div class="small opacity-75 mb-3 text-truncate"
                                            style="max-height: 40px; overflow: hidden;">
                                            {!! Str::limit(strip_tags($ekskul->description), 100) !!}
                                        </div>
                                        <div class="mt-auto">
                                            <a href="{{ route('ekstrakulikuler.detail', ['id' => $ekskul->id]) }}"
                                                class="btn btn-outline-light btn-sm rounded-pill px-4">Lihat Detail <i
                                                    class="bi bi-chevron-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                            <div class="card-body py-5 text-muted">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-trophy-fill fs-1"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-3">Tunggu Tanggal Mainnya!</h4>
                                <p class="mb-0 mx-auto" style="max-width: 500px;">Data ekstrakurikuler akan segera
                                    ditampilkan di sini setelah diperbarui oleh administrator sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

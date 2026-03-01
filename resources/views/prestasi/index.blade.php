@extends('layouts.layouts')

@section('content')
    @php
        // Provide fallback empty data if the controller does not pass $prestasi yet
        if (!isset($prestasi)) {
            $prestasi = collect([
                (object) [
                    'id' => 1,
                    'title' => 'Juara 1 Lomba Pidato Bahasa Arab Nasional',
                    'category' => 'Bahasa',
                    'image' => null,
                    'description' =>
                        'Siswa kami berhasil mengharumkan nama sekolah dengan meraih Juara 1 pada ajang kompetisi bergengsi tingkat nasional.',
                ],
                (object) [
                    'id' => 2,
                    'title' => 'Medali Emas Olimpiade Sains (OSN) Matematika',
                    'category' => 'Akademik',
                    'image' => null,
                    'description' =>
                        'Prestasi membanggakan dari ananda dalam memecahkan soal-soal matematika tingkat tinggi di ajang Olimpiade Sains Provinsi.',
                ],
                (object) [
                    'id' => 3,
                    'title' => 'Juara Umum Turnamen Pencak Silat Pelajar',
                    'category' => 'Olahraga',
                    'image' => null,
                    'description' =>
                        'Tim pencak silat sekolah membuktikan ketangguhannya dengan meraih gelar Juara Umum di turnamen bela diri antar pelajar.',
                ],
            ]);
        }
    @endphp
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #14532d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kebanggaan Sekolah</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Prestasi</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Pencapaian gemilang siswa dan siswi SMP Al-Husainiyyah di berbagai bidang akademik maupun non-akademik.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section id="prestasi-page" class="py-5 bg-light">
        <div class="container py-4">
            @if (isset($prestasi) && $prestasi->count() > 0)
                <div class="row g-4 justify-content-center">
                    @foreach ($prestasi as $item)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="w-100 object-fit-cover"
                                        alt="{{ $item->title }}" style="height: 280px;">
                                @else
                                    <img src="{{ asset('assets/images/activity-01.jpg') }}" class="w-100 object-fit-cover"
                                        alt="{{ $item->title }}" style="height: 280px;">
                                @endif
                                <div class="ig-overlay"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 100%);">
                                </div>
                                <div class="position-absolute bottom-0 start-0 p-4 text-white w-100" style="z-index:2;">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div
                                            class="bg-warning text-dark px-2 py-1 rounded-2 small fw-bold d-inline-flex align-items-center">
                                            <i class="bi bi-trophy-fill me-1"></i> Juara
                                        </div>
                                        <span
                                            class="badge bg-white bg-opacity-25 rounded-pill small">{{ $item->category ?? 'Prestasi' }}</span>
                                    </div>
                                    <h5 class="fw-bold mb-2">{{ $item->title }}</h5>
                                    <div class="small opacity-75 text-truncate mb-3" style="max-height: 40px;">
                                        {!! Str::limit(strip_tags($item->description), 80) !!}
                                    </div>
                                    <a href="{{ route('prestasi.detail', ['id' => Str::slug($item->title ?? 'detail')]) }}"
                                        class="btn btn-outline-light btn-sm rounded-pill px-4">Lihat Detail <i
                                            class="bi bi-chevron-right ms-1"></i></a>
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
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-award-fill fs-1"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-3">Prestasi Akan Segera Tampil</h4>
                                <p class="mb-0 mx-auto" style="max-width: 500px;">Data prestasi luar biasa dari siswa-siswi
                                    kami akan segera ditambahkan di sini oleh administrator sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

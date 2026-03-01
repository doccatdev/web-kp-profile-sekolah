@extends('layouts.layouts')

@section('content')
    @php
        if (!isset($guru)) {
            $guru = collect([
                (object) [
                    'id' => 'budi-santoso',
                    'title' => 'Budi Santoso, S.Pd',
                    'jabatan' => 'Kepala Sekolah',
                    'avatar' => null,
                    'description' =>
                        'Memiliki pengalaman lebih dari 15 tahun di bidang pendidikan. Mendedikasikan diri untuk kemajuan sekolah.',
                ],
                (object) [
                    'id' => 'siti-aminah',
                    'title' => 'Siti Aminah, M.Pd',
                    'jabatan' => 'Wakil Kepala Kurikulum',
                    'avatar' => null,
                    'description' => 'Ahli dalam pengembangan kurikulum pendidikan Islam terpadu.',
                ],
                (object) [
                    'id' => 'ahmad-subagja',
                    'title' => 'Ahmad Subagja, S.Ag',
                    'jabatan' => 'Guru PAI',
                    'avatar' => null,
                    'description' => 'Pengajar Pendidikan Agama Islam yang sangat dihormati oleh anak-anak didiknya.',
                ],
            ]);
        }
    @endphp
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #14532d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Pendidik Inspiratif</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Tenaga Kependidikan</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Pendidik profesional dan berdedikasi tinggi yang siap membimbing siswa meraih prestasi gemilang.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section" data-aos="fade-up">
                <div class="row justify-content-center">
                    @if (isset($guru) && $guru->count() > 0)
                        <div class="row g-4 justify-content-center">
                            @foreach ($guru as $item)
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                    <div
                                        class="card border-0 shadow-sm rounded-4 h-100 text-center hover-lift position-relative overflow-hidden">
                                        <div class="bg-success opacity-10 position-absolute top-0 start-0 w-100"
                                            style="height: 100px;"></div>
                                        <div class="card-body pt-5 px-4 pb-4 d-flex flex-column align-items-center">
                                            <img src="{{ $item->avatar ?? asset('assets/images/activity-01.jpg') }}"
                                                class="rounded-circle shadow-sm mb-3 position-relative bg-white p-1"
                                                style="width: 120px; height: 120px; object-fit: cover; border: 3px solid var(--emerald-green, #14532d); margin-top: -30px;"
                                                alt="{{ $item->title }}">
                                            <h5 class="fw-bold fs-6 mb-1">{{ $item->title }}</h5>
                                            <span
                                                class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 mb-3 fw-medium">{{ $item->jabatan }}</span>
                                            <div class="mt-auto w-100">
                                                <a href="{{ route('profil.data-guru.detail', ['id' => $item->id]) }}"
                                                    class="btn btn-outline-success btn-sm rounded-pill w-100">Lihat Profil
                                                    <i class="bi bi-chevron-right ms-1"></i></a>
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
                                        <i class="bi bi-people-fill fs-1 mb-3 d-block text-success"></i>
                                        <p class="mb-0">Data tenaga kependidikan akan ditampilkan di sini setelah diisi
                                            melalui
                                            panel admin (Filament).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
    @php
        $title = $title ?? ucwords(str_replace('-', ' ', $id ?? 'Detail Pengumuman'));
        if (!isset($data)) {
            $data = (object) [
                'title' => $title,
                'content' =>
                    '<p>Detail pengumuman <strong>' .
                    $title .
                    '</strong>. Informasi ini merupakan pengumuman resmi dari pihak sekolah.</p>',
            ];
        }
    @endphp
    <!-- Detail Hero Section -->
    <section class="position-relative" style="margin-top: 76px;">
        <!-- Background Banner -->
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="{{ $data->image ?? asset('assets/images/activity-01.jpg') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $title ?? 'Pengumuman' }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}"
                                class="text-white text-decoration-none">Pengumuman</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Detail Content -->
    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white p-0">
                            <div class="konten-berita">
                                <h2 class="fw-bold mb-3">{{ $title ?? 'Detail Pengumuman' }}</h2>

                                <div class="d-flex align-items-center flex-wrap mb-4 text-secondary shadow-sm bg-light rounded-3 px-4 py-3"
                                    style="gap: 20px; font-size: 0.95rem; border: 1px solid #eee;">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-check me-2 text-danger fs-5"></i>
                                        <span>Tanggal:
                                            <strong>{{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-megaphone-fill me-2 text-success fs-5"></i>
                                        <span class="fw-bold text-dark">Pengumuman Sekolah</span>
                                    </div>
                                </div>

                                <div class="text-secondary body-text"
                                    style="line-height: 1.8; text-align: justify; color: #4b5563;">
                                    {!! $data->content ?? '<p>Konten pengumuman tidak ditemukan atau sedang diupdate.</p>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

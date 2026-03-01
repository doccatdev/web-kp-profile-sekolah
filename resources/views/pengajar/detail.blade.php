@extends('layouts.layouts')

@section('content')
    @php
        $title = $title ?? ucwords(str_replace('-', ' ', $id ?? 'Nama Guru'));
        if (!isset($data)) {
            $data = (object) [
                'title' => $title,
                'jabatan' => 'Tenaga Pendidik',
                'avatar' => null,
                'description' =>
                    '<p>Profil lengkap <strong>' .
                    $title .
                    '</strong>. Beliau adalah salah satu tenaga pendidik terbaik di SMP Al-Husainiyyah yang berdedikasi tinggi mencerdaskan kehidupan bangsa.</p>',
            ];
        }
    @endphp
    <!-- Detail Hero Section -->
    <section class="position-relative" style="margin-top: 76px;">
        <!-- Background Banner -->
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            <img src="{{ $data->image ?? asset('assets/images/activity-02.jpg') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                alt="{{ $title ?? 'Detail Tenaga Kependidikan' }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/profil/data-guru') }}"
                                class="text-white text-decoration-none">Tenaga Kependidikan</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Detail Content -->
    <section class="py-5 bg-light pb-5 mb-5">
        <div class="container" style="margin-top: -80px; position: relative; z-index: 3;">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body p-4 p-md-5 bg-white">
                            <div class="row text-center text-md-start align-items-center mb-4 pb-4 border-bottom">
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <img src="{{ $data->avatar ?? asset('assets/images/activity-01.jpg') }}"
                                        class="rounded-circle shadow-sm object-fit-cover mx-auto mx-md-0"
                                        style="width: 150px; height: 150px; border: 4px solid var(--emerald-green, #14532d)"
                                        alt="{{ $title }}">
                                </div>
                                <div class="col-md-9">
                                    <h2 class="fw-bold mb-2">{{ $title ?? 'Nama Guru' }}</h2>
                                    <span
                                        class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 mb-3 fw-bold fs-6">
                                        <i class="bi bi-briefcase-fill me-2"></i>{{ $data->jabatan ?? 'Tenaga Pendidik' }}
                                    </span>
                                </div>
                            </div>

                            <div class="konten-berita">
                                <div class="text-secondary body-text"
                                    style="line-height: 1.8; text-align: justify; color: #4b5563;">
                                    {!! $data->description ??
                                        '<p>Belum ada deskripsi profil lengkap untuk tenaga pendidik ini. Profil akan diupdate segera oleh administrator.</p>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

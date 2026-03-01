@extends('layouts.layouts')

@section('content')
    @php
        $title = $title ?? ucwords(str_replace('-', ' ', $id ?? 'Detail Prestasi'));
    @endphp
    <!-- Detail Hero Section -->
    <section class="position-relative" style="margin-top: 76px;">
        <!-- Background Banner -->
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0"
                style="background: linear-gradient(to top, rgba(20, 83, 45, 0.85), rgba(0, 0, 0, 0.3)); z-index: 1;"></div>
            {{-- In a real app we would use $prestasi->image, but we fallback to a placeholder --}}
            <img src="{{ asset('assets/images/activity-01.jpg') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $title ?? 'Detail Prestasi' }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('prestasi.index') }}"
                                class="text-white text-decoration-none">Prestasi</a></li>
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
                            <div class="konten-berita">
                                {{-- 1. Judul --}}
                                <h2 class="fw-bold mb-3">{{ $title ?? 'Detail Prestasi' }}</h2>

                                {{-- 2. Baris Icon --}}
                                <div class="d-flex align-items-center flex-wrap mb-4 text-secondary shadow-sm bg-light rounded-3 px-4 py-3"
                                    style="gap: 20px; font-size: 0.95rem; border: 1px solid #eee;">

                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-trophy-fill me-2 text-warning fs-5"></i>
                                        <span class="fw-bold text-dark">Tingkat Nasional</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-check me-2 text-success fs-5"></i>
                                        <span>Tahun: <strong>{{ date('Y') }}</strong></span>
                                    </div>
                                </div>

                                {{-- 3. Isi Konten --}}
                                <div class="text-secondary body-text"
                                    style="line-height: 1.8; text-align: justify; color: #4b5563;">
                                    <p class="lead fw-normal text-dark">
                                        Siswa SMP Al-Husainiyyah kembali menorehkan prestasi gemilang di kancah pendidikan.
                                        Berkat kerja keras, dedikasi, serta bimbingan intensif dari para guru, gelar juara
                                        berhasil diraih.
                                    </p>
                                    <p>
                                        Prestasi ini membuktikan bahwa program unggulan sekolah berjalan dengan sangat
                                        efektif dalam mencetak generasi cerdas, berkarakter, dan religius sesuai visi dan
                                        misi sekolah. Kami sangat bangga atas pencapaian ini dan senantiasa mendukung
                                        seluruh siswa untuk terus mengeksplorasi potensi maksimal mereka baik di bidang
                                        akademik maupun non-akademik.
                                    </p>
                                    <div
                                        class="bg-success bg-opacity-10 p-4 rounded-3 border-start border-success border-4 mt-4">
                                        <h5 class="fw-bold text-success mb-2">Pesan Kepala Sekolah</h5>
                                        <p class="mb-0 text-dark fst-italic">"Keberhasilan ini adalah langkah awal. Teruslah
                                            berkarya, junjung tinggi akhlak mulia, dan jadilah inspirasi bagi sesama."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Back Button --}}
                    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Prestasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

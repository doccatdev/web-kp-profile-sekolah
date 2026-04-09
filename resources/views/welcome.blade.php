@extends('layouts.layouts')

@section('content')
    <section id="hero" class="p-0 block">
        <div id="heroCarousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">

            @php
                $allImages = [];
                foreach ($sliders as $slider) {
                    if ($slider->images && is_array($slider->images)) {
                        foreach ($slider->images as $img) {
                            $allImages[] = [
                                'url' => $img,
                                'title' => $slider->title,
                                'caption' => $slider->caption,
                            ];
                        }
                    }
                }
            @endphp

            <div class="carousel-indicators" style="z-index: 5;">
                @foreach ($allImages as $index => $item)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                    </button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($allImages as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="d-flex align-items-center"
                            style="height: 100vh; min-height: 600px;
                        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ Storage::url($item['url']) }}') center/cover no-repeat;">

                            <div class="container position-relative text-white" style="z-index: 1;">
                                <div class="row align-items-center text-start">
                                    <div class="col-lg-8" data-aos="fade-right">
                                        @if (isset($ppdb) && $ppdb->status === 'Buka')
                                            <span class="badge bg-success mb-3 px-3 py-2 rounded-pill shadow-sm">
                                                <i class="bi bi-megaphone-fill me-2"></i> SPMB {{ $ppdb->tahun_ajaran }}
                                                Telah Dibuka
                                            </span>

                                            <h1 class="display-4 mb-4 fw-bold">
                                                {{ $item['title'] ?? 'Seleksi Penerimaan Murid Baru' }}</h1>
                                            <p class="lead mb-5" style="max-width: 650px;">
                                                {{ $item['caption'] ?? 'Mari bergabung bersama kami.' }}</p>

                                            <div class="d-flex gap-3">
                                                <a href="{{ url('/ppdb') }}"
                                                    class="btn btn-outline-light btn-lg rounded-pill px-5 shadow">
                                                    Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        @else
                                            <h1 class="display-4 mb-4 fw-bold">{{ $item['title'] }}</h1>
                                            <p class="lead mb-5" style="max-width: 650px;">{{ $item['caption'] }}</p>

                                            <div class="d-flex gap-3">
                                                <a href="#strength"
                                                    class="btn btn-outline-light btn-lg rounded-pill px-5 shadow">
                                                    Pelajari Lebih Lanjut <i class="bi bi-arrow-down ms-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-4 bg-white border-bottom" style="margin-top: 0; z-index: 10; position: relative;">
        <div class="container">
            <div class="row text-center g-4 align-items-center justify-content-center">
                <div class="col-6 col-md-3" data-aos="fade-up">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <span class="fw-bold display-6 text-success">B</span>
                        <span class="small text-muted fw-semibold">Akreditasi</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-lightbulb-fill fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Cerdas</span>
                        <span class="small text-muted" style="font-size:11px;">Unggul dalam ilmu</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-shield-fill-check fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Berkarakter</span>
                        <span class="small text-muted" style="font-size:11px;">Berakhlak mulia</span>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;">
                            <i class="bi bi-moon-stars-fill fs-5"></i>
                        </div>
                        <span class="fw-bold text-dark">Religius</span>
                        <span class="small text-muted" style="font-size:11px;">Teguh dalam iman</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="program-unggulan" class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Pilar Pendidikan</span>
                <h2 class="fw-bold display-6">Program <span class="text-success">Unggulan</span></h2>
                <div class="stripe-red mx-auto mt-3"></div>
                <p class="text-muted mt-3 mx-auto" style="max-width: 500px;">Kurikulum terintegrasi antara ilmu umum dan
                    nilai Islam moderat untuk mencetak generasi unggul.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($programUnggulan as $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card h-100 border rounded-3 overflow-hidden text-start shadow-none">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top object-fit-cover"
                                style="height: 220px;" alt="{{ $item->nama_program }}">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 d-inline-flex">
                                        <i class="{{ $item->icon_class ?? 'bi bi-star-fill' }} fs-5"></i>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">
                                        {{ $item->badge_text ?? 'Unggulan' }}
                                    </span>
                                </div>
                                <h5 class="fw-bold mb-2 text-dark">{{ $item->nama_program }}</h5>
                                <p class="small text-muted mb-4 flex-grow-1">{{ $item->deskripsi_singkat }}</p>
                                <a href="{{ route('program-unggulan.detail', $item->slug) }}"
                                    class="btn btn-outline-success btn-sm rounded-pill align-self-start px-4">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted italic">Data program unggulan belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            @if ($programUnggulan->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('program-unggulan.index') }}" class="btn btn-emerald rounded-pill px-5">
                        Lihat Semua Program Unggulan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section id="strength" class="py-5 bg-white">
        <div class="container py-5">
            <div class="row align-items-end mb-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal"
                        style="background-color: #009b4d !important;">Prestasi siswa</span>
                    <h2 class="fw-bold display-5 mt-2">Dedikasi & <span class="text-success"
                            style="color: #009b4d !important;">Prestasi</span> Tanpa Batas</h2>
                    <div class="stripe-green"
                        style="width: 50px; height: 4px; background-color: #009b4d; margin-top: 10px;"></div>
                </div>
                <div class="col-lg-5 text-lg-end mt-3 mt-lg-0" data-aos="fade-left">
                    <a href="{{ route('prestasi.index') }}" class="btn btn-emerald rounded-pill px-4 text-white"
                        style="background-color: #009b4d; border: none;">
                        Lihat Semua Prestasi <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($prestasis as $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm transition-all hover-lift"
                            style="background: #fff;">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-100 object-fit-cover"
                                    style="height: 240px;" alt="{{ $item->judul }}">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill shadow-sm fw-bold"
                                        style="background-color: rgba(255, 255, 255, 0.9); color: #009b4d; backdrop-filter: blur(4px); font-size: 0.75rem; border: 1px solid #c3e6cb;">
                                        {{ $item->tingkat }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-2">
                                    <span class="badge rounded-pill fw-bold px-3 py-2"
                                        style="background-color: #e6f6ed; color: #009b4d; font-size: 0.75rem; border: 1px solid #c3e6cb;">
                                        {{ $item->kategori_prestasi }}
                                    </span>
                                </div>
                                <h4 class="fw-bold mb-2 text-dark" style="font-size: 1.25rem;">{{ $item->judul }}</h4>
                                <p class="text-muted mb-4" style="font-size: 0.9rem; line-height: 1.6;">
                                    {{ $item->deskripsi_singkat ?? Str::limit(strip_tags($item->konten), 100) }}
                                </p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-end align-items-center">
                                    <a href="{{ route('prestasi.show', $item->slug) }}"
                                        class="text-decoration-none fw-bold d-flex align-items-center"
                                        style="color: #009b4d; font-size: 0.85rem;">
                                        Selengkapnya <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 border rounded-4 bg-light">
                            <i class="bi bi-inboxes fs-1 text-muted"></i>
                            <p class="text-muted mt-3">Belum ada data prestasi terbaru untuk ditampilkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3 py-2 mb-2">Lingkungan Belajar</span>
                <h2 class="fw-bold">Fasilitas <span class="text-success">Modern</span></h2>
                <p class="text-muted">Sarana dan prasarana lengkap untuk mendukung proses<br>belajar mengajar yang optimal.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($fasilitas as $f)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border">
                            <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center mb-3"
                                style="width:48px;height:48px;">
                                <i class="{{ $f->icon_class ?? 'bi bi-building' }} fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $f->nama_fasilitas }}</h5>
                            <p class="text-muted small mb-4">{{ $f->deskripsi_singkat }}</p>
                            <a href="{{ route('fasilitas.detail', $f->slug) }}"
                                class="text-success text-decoration-none fw-bold small d-flex align-items-center mt-auto">
                                Selengkapnya <i class="bi bi-chevron-right ms-1" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted italic">Data fasilitas sekolah belum tersedia.</p>
                    </div>
                @endforelse
            </div>
            @if ($fasilitas->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-success rounded-pill px-4 py-2">
                        Lihat Semua Fasilitas <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section id="ekstrakulikuler" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-bg-success mb-2 px-3 py-2 rounded-pill fw-normal">Pengembangan Bakat</span>
                <h2 class="fw-bold display-6">Ekstrakurikuler <span class="text-success">Unggulan</span></h2>
                <div class="stripe-red mx-auto mt-3"></div>
                <p class="text-muted mt-3 mx-auto" style="max-width: 500px;">Wadah pengembangan minat, bakat, dan potensi siswa di luar jam pelajaran.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($ekstrakulikulers as $ekskul)
                    <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border rounded-3 overflow-hidden shadow-none text-center p-4 h-100">
                            <div class="bg-success bg-opacity-10 text-success rounded-3 d-inline-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width:56px;height:56px;">
                                <i class="bi {{ $ekskul->icon_class }} fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-1">{{ $ekskul->nama_ekskul }}</h6>
                            <p class="text-muted small mb-2">{{ Str::limit($ekskul->deskripsi_singkat, 40) }}</p>
                            <a href="{{ route('ekstrakulikuler.detail', $ekskul->slug) }}"
                                class="text-success small fw-semibold text-decoration-none mt-auto">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>Belum ada data ekstrakurikuler.</p>
                    </div>
                @endforelse
            </div>
            @if ($ekstrakulikulers->count() > 0)
                <div class="text-center mt-5 w-100">
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-success rounded-pill px-5">
                        Lihat Semua Ekskul <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

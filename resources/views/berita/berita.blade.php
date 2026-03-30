@extends('layouts.layouts')

@section('content')
    {{-- 1. PAGE HEADER (HIJAU) --}}
    {{-- margin-top: 76px supaya tidak tertutup Navbar yang fixed --}}
    <section class="py-5 text-white" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kabar Sekolah</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Berita Terkini</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Informasi dan berita terbaru seputar kegiatan serta pencapaian SMP Al Husainiyyah.
            </p>
        </div>
    </section>

    {{-- 2. KONTEN UTAMA (BERITA & SIDEBAR) --}}
    {{-- bg-light untuk membedakan area konten dengan header --}}
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-4">

                {{-- KOLOM KIRI: LIST BERITA --}}
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($news as $item)
                            <div class="col-md-6 mb-4" data-aos="fade-up">
                                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden"
                                    style="transition: transform 0.3s ease;">
                                    {{-- Area Gambar --}}
                                    <div class="position-relative">
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                                            class="card-img-top object-fit-cover" style="height: 220px;"
                                            alt="{{ $item->news_title }}">

                                        @if ($item->category)
                                            <span
                                                class="position-absolute top-0 start-0 m-3 badge bg-danger shadow-sm py-2 px-3 rounded-pill">
                                                {{ $item->category->name_category }}
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Area Teks --}}
                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="mb-2">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar3 me-1 text-success"></i>
                                                {{ $item->posted_at->locale('id')->translatedFormat('d F Y') }}
                                            </small>
                                        </div>

                                        <h5 class="fw-bold mb-3">
                                            <a href="{{ route('berita.show', $item->slug) }}"
                                                class="text-decoration-none text-dark hover-success">
                                                {{ Str::limit($item->news_title, 60) }}
                                            </a>
                                        </h5>

                                        <p class="text-muted small mb-4 flex-grow-1">
                                            {{ $item->excerpt ?? Str::limit(strip_tags($item->news_content), 110) }}
                                        </p>

                                        <div class="mt-auto">
                                            <a href="{{ route('berita.show', $item->slug) }}"
                                                class="text-decoration-none text-success fw-bold small text-uppercase d-inline-flex align-items-center">
                                                Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="card border-0 shadow-sm p-5 rounded-4 bg-white">
                                    <i class="bi bi-newspaper fs-1 text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Belum ada berita yang diterbitkan saat ini.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    {{-- PAGINATION --}}
                    @if ($news->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $news->links() }}
                        </div>
                    @endif
                </div>

                {{-- KOLOM KANAN: SIDEBAR KATEGORI --}}
                <div class="col-lg-4">
                    {{-- STICKY SIDEBAR: top: 100px agar tidak tertabrak Navbar --}}
                    <div class="sticky-top" style="top: 100px; z-index: 5;">
                        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <i class="bi bi-grid-fill me-2 text-success"></i> Kategori Berita
                            </h5>

                            <div class="list-group list-group-flush">
                                {{-- Link Semua Berita --}}
                                <a href="{{ route('berita.index') }}"
                                    class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ !request('kategori') ? 'text-success fw-bold' : 'text-dark' }}">
                                    <span>Semua Berita</span>
                                    <i class="bi bi-chevron-right small"></i>
                                </a>

                                {{-- Loop Kategori --}}
                                @foreach ($categories as $cat)
                                    <a href="{{ route('berita.index', ['kategori' => $cat->slug]) }}"
                                        class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ request('kategori') == $cat->slug ? 'text-success fw-bold' : 'text-dark' }}">
                                        <span>{{ $cat->name_category }}</span>
                                        <span
                                            class="badge rounded-pill bg-light text-dark border fw-normal">{{ $cat->news_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- End Row --}}
        </div> {{-- End Container --}}
    </section>
@endsection

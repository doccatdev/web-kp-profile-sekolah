@extends('layouts.layouts')

@section('content')
    {{-- 1. PAGE HEADER (HIJAU) --}}
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

    {{-- 2. KONTEN UTAMA --}}
    <section class="bg-light py-5">
        <div class="container">
            
            {{-- NOTIFIKASI DARI CONTROLLER --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 p-3 mb-5" 
                     role="alert" 
                     data-aos="zoom-in">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-success">Berhasil!</h6>
                            <small>{{ session('success') }}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- FITUR PENULIS (MEDIUM STYLE INTERACTION) --}}
            @auth
                @if(auth()->user()->hasRole('teacher'))
                <div class="row mb-5" data-aos="fade-up">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="fw-bold mb-1">Halo, {{ auth()->user()->name }}! 👋</h4>
                                    <p class="text-muted mb-md-0">Punya cerita menarik atau prestasi siswa untuk dibagikan hari ini?</p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="{{ route('berita.create') }}" class="btn btn-success btn-lg rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-pencil-square me-2"></i>Mulai Menulis
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endauth

            <div class="row g-4">
                {{-- KOLOM KIRI: LIST BERITA --}}
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($news as $item)
                            <div class="col-md-6 mb-4" data-aos="fade-up">
                                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden card-hover"
                                    style="transition: transform 0.3s ease;">
                                    
                                    <div class="position-relative">
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                                            class="card-img-top object-fit-cover" style="height: 220px;"
                                            alt="{{ $item->news_title }}">

                                        @if ($item->category)
                                            <span class="position-absolute top-0 start-0 m-3 badge bg-danger shadow-sm py-2 px-3 rounded-pill">
                                                {{ $item->category->name_category }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar3 me-1 text-success"></i>
                                                {{ $item->posted_at->locale('id')->translatedFormat('d F Y') }}
                                            </small>
                                            
                                            @auth
                                                @if($item->author_id === auth()->id() && $item->status !== 'published')
                                                    <a href="{{ route('berita.edit', $item->id) }}" class="badge bg-warning text-dark text-decoration-none py-2 px-3 rounded-pill">
                                                        <i class="bi bi-pencil me-1"></i>Edit Draft
                                                    </a>
                                                @endif
                                            @endauth
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

                                        <div class="mt-auto pt-3 border-top">
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

                {{-- KOLOM KANAN: SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px; z-index: 5;">
                        
                        {{-- KATEGORI --}}
                        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white mb-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <i class="bi bi-grid-fill me-2 text-success"></i> Kategori Berita
                            </h5>

                            <div class="list-group list-group-flush">
                                <a href="{{ route('berita.index') }}"
                                    class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ !request('kategori') ? 'text-success fw-bold' : 'text-dark' }}">
                                    <span>Semua Berita</span>
                                    <i class="bi bi-chevron-right small"></i>
                                </a>

                                @foreach ($categories as $cat)
                                    <a href="{{ route('berita.index', ['kategori' => $cat->slug]) }}"
                                        class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ request('kategori') == $cat->slug ? 'text-success fw-bold' : 'text-dark' }}">
                                        <span>{{ $cat->name_category }}</span>
                                        <span class="badge rounded-pill bg-light text-dark border fw-normal">{{ $cat->news_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .card-hover:hover {
        transform: translateY(-10px) !important;
    }
    .hover-success:hover {
        color: #009b4d !important;
    }
</style>
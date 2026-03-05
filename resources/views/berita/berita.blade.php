@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #009b4d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kabar Sekolah</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Berita Terkini</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Informasi dan berita terbaru seputar kegiatan serta pencapaian SMP Al Husainiyyah.
            </p>
        </div>
    </section>

    <div class="row g-4">
        {{-- Kolom Berita --}}
        <div class="col-lg-8">
            <div class="row">
                @forelse($news as $item)
                    <div class="col-lg-6 mb-4" data-aos="fade-up">
                        <div class="card card-news border-0 shadow-sm h-100">
                            <div class="position-relative">
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                                    class="card-img-top" alt="{{ $item->news_title }}">

                                @if ($item->category)
                                    <span
                                        class="position-absolute top-0 start-0 m-3 badge bg-danger category-badge shadow-sm">
                                        {{ $item->category->name_category }}
                                    </span>
                                @endif
                            </div>

                            <div class="card-body p-4">
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $item->posted_at->locale('id')->translatedFormat('d F Y') }}
                                    </small>
                                </div>

                                <h5 class="fw-bold mb-3">
                                    <a href="{{ route('berita.show', $item->slug) }}"
                                        class="text-decoration-none text-dark lh-base">
                                        {{ Str::limit($item->news_title, 55) }}
                                    </a>
                                </h5>

                                <p class="text-muted small mb-4 text-excerpt">
                                    {{ $item->excerpt ?? Str::limit(strip_tags($item->news_content), 110) }}
                                </p>

                                <a href="{{ route('berita.show', $item->slug) }}"
                                    class="btn-selengkapnya text-decoration-none text-danger fw-bold small text-uppercase">
                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada berita yang diterbitkan.</p>
                    </div>
                @endforelse
            </div>

            @if ($news->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $news->links() }}
                </div>
            @endif
        </div>

        {{-- Kolom Kategori (FIXED STICKY) --}}
        <div class="col-lg-4">
            {{-- JANGAN pakai data-aos di div ini karena bisa merusak posisi sticky --}}
            <div class="sidebar-sticky">
                <div class="card sidebar-category border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-4">Kategori Berita</h5>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('berita.index') }}"
                            class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ !request('kategori') ? 'text-danger fw-bold' : 'text-dark' }}">
                            <span><i class="bi bi-grid-fill me-2"></i> Semua Berita</span>
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('berita.index', ['kategori' => $cat->slug]) }}"
                                class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center {{ ($kategoriAktif ?? null) === $cat->slug ? 'text-danger fw-bold' : 'text-dark' }}">
                                <span><i class="bi bi-chevron-right small me-2"></i> {{ $cat->name_category }}</span>
                                <span
                                    class="badge rounded-pill bg-light text-dark border fw-normal">{{ $cat->news_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- End Kolom Kategori --}}
    </div>
    </div>
    </section>
@endsection

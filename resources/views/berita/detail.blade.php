@extends('layouts.layouts')

@section('content')
    {{-- Hero Section --}}
    <section class="position-relative" style="margin-top: 76px;">
        <div class="w-100 overflow-hidden" style="height: 450px; position: relative;">
            <div class="position-absolute w-100 h-100 top-0 start-0" style="background: rgba(0, 0, 0, 0.2); z-index: 1;"></div>

            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="{{ $item->news_title }}">

            <div class="container position-relative h-100 d-flex flex-column justify-content-end pb-5" style="z-index: 2;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-white text-decoration-none">Berita</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-5 bg-white pb-5 mb-5">
        <div class="container" style="position: relative; z-index: 3;">
            <div class="row">
                {{-- Kolom Kiri: Konten & Komentar --}}
                <div class="col-lg-8 pe-lg-5">
                    <div class="konten-berita">
                        <h2 class="fw-bold mb-3" data-aos="fade-up">{{ $item->news_title }}</h2>

                        <div class="d-flex align-items-center flex-wrap mb-4 text-secondary py-3 border-bottom"
                            style="gap: 20px; font-size: 0.95rem;" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-calendar-check me-2 text-success" style="font-size: 1.1rem;"></i>
                                <span>Dipublikasikan: <strong>{{ $item->posted_at->locale('id')->translatedFormat('j F Y') }}</strong></span>
                            </div>

                            @if ($item->category)
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-tags-fill text-success me-2" style="font-size: 1.1rem;"></i>
                                    <span>Kategori:
                                        <a href="{{ route('berita.index', ['category' => $item->category->slug]) }}" class="text-decoration-none fw-bold text-success">
                                            {{ $item->category->name_category }}
                                        </a>
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="text-secondary mb-5" style="line-height: 1.8; text-align: justify;" data-aos="fade-up" data-aos-delay="200">
                            {!! $item->news_content !!}
                        </div>

                        {{-- Bagian Komentar --}}
                        <div class="komentar-section mt-5 pt-4 border-top" data-aos="fade-up">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-chat-left-text-fill text-success fs-4 me-2"></i>
                                <h4 class="fw-bold mb-0">Komentar ({{ $comments->count() }})</h4>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="comments-list mb-5">
                                @forelse ($comments as $comment)
                                    <div class="card border-0 bg-light rounded-4 mb-3 shadow-sm">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                                                        {{ strtoupper(substr($comment->guest_name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <h6 class="fw-bold mb-0">{{ $comment->guest_name }}</h6>
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0 text-secondary" style="white-space: pre-line;">{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-4 bg-light rounded-4 mb-5">
                                        <p class="text-muted mb-0 small">Belum ada komentar.</p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="comment-form-container">
                                <h4 class="fw-bold mb-4">Tulis Komentar</h4>
                                <form method="POST" action="{{ route('comment.store') }}">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $item->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $parent_id ?? '' }}">

                                    <div class="row g-3">
                                        {{-- Input Nama Guest --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Nama Lengkap*</label>
                                            <input type="text" name="guest_name"
                                                class="form-control p-3 bg-light border-0 @error('guest_name') is-invalid @enderror"
                                                placeholder="Nama Anda" required value="{{ old('guest_name') }}">
                                            @error('guest_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        {{-- Input Email Guest --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Alamat Email*</label>
                                            <input type="email" name="guest_mail"
                                                class="form-control p-3 bg-light border-0 @error('guest_mail') is-invalid @enderror"
                                                placeholder="email@anda.com" required value="{{ old('guest_mail') }}">
                                            @error('guest_mail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label class="form-label small fw-bold">Pesan Komentar*</label>
                                            <textarea name="body" class="form-control p-3 bg-light border-0 @error('body') is-invalid @enderror" rows="4" placeholder="Tulis pendapat Anda..." required>{{ old('body') }}</textarea>
                                            @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-2">
                                        <button type="submit" class="btn btn-success px-5 py-3 fw-bold shadow-sm rounded-pill d-flex align-items-center justify-content-center" style="min-width: 200px;">
                                            <i class="bi bi-send-fill me-2"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Sidebar --}}
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sticky-top" style="top: 100px; z-index: 10;" data-aos="fade-left">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                            <h5 class="fw-bold mb-0">Berita Lainnya</h5>
                            <a href="{{ route('berita.index') }}" class="text-success text-decoration-none fw-bold small">
                                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            @forelse ($beritaLainnya as $related)
                                <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4" style="height: 100px;">
                                            <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('assets/images/il-berita-01.png') }}"
                                                class="w-100 h-100 object-fit-cover" alt="{{ $related->news_title }}">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-3 bg-white">
                                                <h6 class="card-title fw-bold mb-1 text-truncate-2" style="font-size: 0.85rem; line-height: 1.4;">
                                                    <a href="{{ route('berita.show', $related->slug) }}" class="text-dark text-decoration-none">
                                                        {{ $related->news_title }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted" style="font-size: 0.75rem;">
                                                    <i class="fa-regular fa-calendar me-1"></i>{{ $related->posted_at->translatedFormat('d F Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted small text-center">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
<section class="py-5 bg-light" style="margin-top: 76px;">
    <div class="container py-4">
        <div class="row g-4">

            {{-- 1. KOLOM KIRI: KONTEN BERITA & KOMENTAR --}}
            <div class="col-lg-8">
                <article class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}"
                         class="img-fluid w-100 object-fit-cover" style="max-height: 450px;" alt="...">

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <span>
                                <i class="bi bi-calendar3 me-1 text-success"></i>
                                <strong>Dipublikasikan pada:</strong> {{ $item->posted_at->translatedFormat('d F Y') }}
                            </span>
                            @if($item->category)
                            <span>
                                <i class="bi bi-tag me-1 text-success"></i>
                                <strong>Kategori:</strong> {{ $item->category->name_category }}
                            </span>
                            @endif
                        </div>

                        <h1 class="fw-bold mb-4">{{ $item->news_title }}</h1>

                        <div class="content-text lh-lg">
                            {!! $item->news_content !!}
                        </div>
                    </div>
                </article>

                {{-- Bagian Komentar --}}
                <div class="komentar-section mt-5 pt-4 border-top" data-aos="fade-up">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-chat-left-text-fill text-success fs-4 me-2"></i>
                        <h4 class="fw-bold mb-0">Komentar ({{ $item->approvedComments->count() }})</h4>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="comments-list mb-5">
                        @forelse ($comments as $comment)
                            @php
                                $name = $comment->user ? $comment->user->name : $comment->guest_name;
                            @endphp
                            <div class="card border-0 bg-light rounded-4 mb-3 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            {{-- Icon Avatar Komentar Utama --}}
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($name) }}&background=009b4d&color=fff&rounded=true"
                                                 class="me-3 shadow-sm" width="45" height="45" alt="User Icon">
                                            <div>
                                                <h6 class="fw-bold mb-0 text-dark">{{ $name }}</h6>
                                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-2 text-secondary ms-md-5" style="white-space: pre-line;">{{ $comment->body }}</p>

                                    {{-- Tombol Balas --}}
                                    <div class="ms-md-5">
                                        <button class="btn btn-sm text-success fw-bold p-0 mb-2"
                                                onclick="prepareReply('{{ $comment->id }}', '{{ $name }}')">
                                            <i class="bi bi-reply-fill"></i> Balas
                                        </button>
                                    </div>

                                    {{-- Tampilkan Balasan (Nested) --}}
                                    @if($comment->replies && $comment->replies->count() > 0)
                                        <div class="ms-4 ms-md-5 mt-3 border-start ps-3">
                                            @foreach ($comment->replies as $reply)
                                                @php
                                                    $replyName = $reply->user ? $reply->user->name : $reply->guest_name;
                                                @endphp
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        {{-- Icon Avatar Balasan --}}
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($replyName) }}&background=6c757d&color=fff&rounded=true"
                                                             class="me-2 shadow-sm" width="30" height="30" alt="User Icon">
                                                        <h6 class="fw-bold mb-0 small text-dark">{{ $replyName }}</h6>
                                                    </div>
                                                    <div class="ps-4">
                                                        <small class="text-muted d-block mb-1" style="font-size: 0.7rem;">{{ $reply->created_at->diffForHumans() }}</small>
                                                        <p class="small text-secondary mb-0">{{ $reply->body }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 bg-light rounded-4 mb-5">
                                <p class="text-muted mb-0 small">Belum ada komentar.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Form Komentar --}}
                    <div class="comment-form-container" id="comment-form">
                        <h4 class="fw-bold mb-4">Tulis Komentar</h4>

                        <form method="POST" action="{{ route('comment.store') }}">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $item->id }}">
                            <input type="hidden" name="parent_id" id="parent_id" value="">

                            {{-- Label Reply Info --}}
                            <div id="reply-info" class="alert alert-info d-none d-flex justify-content-between align-items-center py-2 mb-3 border-0 shadow-sm">
                                <small>Membalas: <strong id="reply-to-name"></strong></small>
                                <button type="button" class="btn-close small" style="font-size: 0.6rem" onclick="cancelReply()"></button>
                            </div>

                            <div class="row g-3">
                                @if(!auth()->check())
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-dark">Nama Lengkap*</label>
                                        <input type="text" name="guest_name"
                                            class="form-control p-3 bg-light border-0 shadow-sm @error('guest_name') is-invalid @enderror"
                                            placeholder="Nama Anda" required value="{{ old('guest_name') }}">
                                        @error('guest_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-dark">Alamat Email*</label>
                                        <input type="email" name="guest_mail"
                                            class="form-control p-3 bg-light border-0 shadow-sm @error('guest_mail') is-invalid @enderror"
                                            placeholder="email@anda.com" required value="{{ old('guest_mail') }}">
                                        @error('guest_mail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                @endif

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark">Pesan Komentar*</label>
                                    <textarea name="body" class="form-control p-3 bg-light border-0 shadow-sm @error('body') is-invalid @enderror" rows="4" placeholder="Tulis pendapat Anda..." required>{{ old('body') }}</textarea>
                                    @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4">
                                <button type="submit" class="btn btn-success px-5 py-3 fw-bold shadow-sm rounded-pill d-flex align-items-center justify-content-center" style="min-width: 200px;">
                                    <i class="bi bi-send-fill me-2"></i> Kirim Komentar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- 2. KOLOM KANAN: SIDEBAR --}}
            <div class="col-lg-4">
                <aside class="sticky-top" style="top: 100px;">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                            <h5 class="fw-bold mb-0 text-dark">Berita Lainnya</h5>
                            <a href="{{ route('berita.index') }}" class="text-success text-decoration-none small fw-bold">
                                Lihat Semua <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            @forelse ($beritaLainnya as $related)
                                <a href="{{ route('berita.show', $related->slug) }}" class="text-decoration-none group">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 80px; height: 70px;" class="flex-shrink-0">
                                            <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('assets/images/il-berita-01.png') }}"
                                                 class="w-100 h-100 object-fit-cover rounded-3 shadow-sm" alt="...">
                                        </div>
                                        <div class="overflow-hidden">
                                            <h6 class="text-dark fw-bold mb-1 small lh-sm text-truncate-2"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $related->news_title }}
                                            </h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                {{ $related->posted_at->translatedFormat('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                @if(!$loop->last) <hr class="my-0 opacity-5"> @endif
                            @empty
                                <p class="text-muted small text-center">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

{{-- Script UI Nested Reply --}}
<script>
    function prepareReply(id, name) {
        document.getElementById('parent_id').value = id;
        document.getElementById('reply-to-name').innerText = name;
        document.getElementById('reply-info').classList.remove('d-none');
        document.getElementById('comment-form').scrollIntoView({ behavior: 'smooth' });
    }

    function cancelReply() {
        document.getElementById('parent_id').value = '';
        document.getElementById('reply-info').classList.add('d-none');
    }
</script>
@endsection

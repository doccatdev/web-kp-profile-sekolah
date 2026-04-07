@extends('layouts.layouts')

@section('content')
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kebanggaan Sekolah</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Prestasi</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Pencapaian gemilang siswa dan siswi SMP Al-Husainiyyah di berbagai bidang akademik maupun non-akademik.
            </p>
        </div>
    </section>

    <section id="prestasi-page" class="py-5 bg-light">
        <div class="container py-4">
            @if ($prestasis->count() > 0)
                <div class="row g-4 justify-content-center">
                    @foreach ($prestasis as $item)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100 border-0">
                                {{-- Thumbnail --}}
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-100 object-fit-cover"
                                     alt="{{ $item->judul }}" style="height: 280px;">

                                {{-- Dark Overlay --}}
                                <div class="position-absolute top-0 start-0 w-100 h-100"
                                     style="background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.1) 100%); z-index: 1;">
                                </div>

                                {{-- Content on Image --}}
                                <div class="position-absolute bottom-0 start-0 p-4 text-white w-100" style="z-index:2;">
                                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                        {{-- Kategori: Menggunakan kategori_prestasi dari DB --}}
                                        <span class="badge rounded-pill fw-bold px-3 py-2 shadow-sm"
                                              style="background-color: #FFD700; color: #000; font-size: 0.7rem;">
                                            <i class="bi bi-tag-fill me-1"></i> {{ $item->kategori_prestasi }}
                                        </span>

                                        {{-- Tingkat --}}
                                        <span class="badge rounded-pill fw-bold px-3 py-2 shadow-sm"
                                              style="background-color: #00DBDE; color: #fff; font-size: 0.7rem;">
                                            <i class="bi bi-trophy-fill me-1"></i> {{ $item->tingkat }}
                                        </span>
                                    </div>

                                    <h5 class="fw-bold mb-2 text-truncate-2">{{ $item->judul }}</h5>

                                    <a href="{{ route('prestasi.show', $item->slug) }}"
                                        class="btn btn-outline-light btn-sm rounded-pill px-4 mt-2 border-2 fw-bold"
                                        style="backdrop-filter: blur(8px);">
                                        Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-5">
                    {{ $prestasis->links() }}
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center p-5">
                        <div class="bg-white shadow-sm rounded-4 p-5">
                            <i class="bi bi-award-fill fs-1 text-warning mb-4 d-block"></i>
                            <h4 class="fw-bold">Belum Ada Data Prestasi</h4>
                            <p class="text-muted">Data sedang diupdate. Cek kembali nanti!</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

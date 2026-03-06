@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Tentang Kami</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Sejarah Sekolah</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Langkah awal dan perjalanan panjang berdirinya institusi pencetak generasi cerdas berkarakter religius.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section" data-aos="fade-up">
                @if (isset($sejarah) && $sejarah)
                    {{-- Nanti: data dari Filament CRUD --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm">
                                <h4 class="fw-bold mb-4">{{ $sejarah->judul ?? 'Sejarah' }}</h4>
                                <div class="body-text" style="line-height: 1.8; text-align: justify; color: #4b5563;">
                                    {!! $sejarah->konten ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                                <div class="card-body py-5 text-muted">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                        style="width: 80px; height: 80px;">
                                        <i class="bi bi-clock-history fs-1"></i>
                                    </div>
                                    <h4 class="fw-bold text-dark mb-3">Sejarah Belum Tersedia</h4>
                                    <p class="mb-0 mx-auto" style="max-width: 500px;">Konten sejarah akan ditampilkan di
                                        sini setelah diisi melalui panel admin (Filament).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

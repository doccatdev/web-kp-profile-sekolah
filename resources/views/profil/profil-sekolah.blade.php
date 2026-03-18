@extends('layouts.layouts')

@section('content')
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Tentang Kami</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Profil Sekolah</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Mengenal lebih dekat identitas SMP Al Husainiyah.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section">
                @if (isset($profil) && $profil->profil_sekolah)
                    <div class="row g-4 align-items-center">
                        {{-- Kolom Kiri: Teks Profil --}}
                        <div class="col-md-8" data-aos="fade-right">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm h-100">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                        <i class="bi bi-info-square-fill fs-3"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0">Tentang Kami</h3>
                                </div>
                                <div class="body-text" style="line-height: 1.8; color: #4b5563;">
                                    {!! $profil->profil_sekolah !!}
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan: Logo Sekolah (Dinamis dari Admin) --}}
                        <div class="col-md-4 text-center" data-aos="fade-left">
                            <div class="p-4">
                                @if ($profil->logo_sekolah)
                                    <img src="{{ asset('storage/' . $profil->logo_sekolah) }}" alt="Logo SMP Al Husainiyah"
                                        class="img-fluid"
                                        style="max-height: 300px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
                                @else
                                    <div class="text-muted opacity-25">
                                        <i class="bi bi-image" style="font-size: 7rem;"></i>
                                        <p>Logo belum diunggah</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center text-center py-5 text-muted" data-aos="zoom-in">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm rounded-4 p-5">
                                <p class="mb-0">Data profil sekolah sedang diupdate.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

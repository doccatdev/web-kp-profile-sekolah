@extends('layouts.layouts')

@section('content')
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Tentang Kami</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Visi & Misi</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Pondasi dan tujuan mulia demi membimbing setiap langkah kami dalam dunia pendidikan islam modern.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="content-section" data-aos="fade-up">
                @if (isset($visiMisi) && $visiMisi)
                    <div class="row g-4 justify-content-center">
                        {{-- Kolom Kiri: VISI --}}
                        <div class="col-md-5">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm h-100">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                        {{-- Icon Target/Tujuan --}}
                                        <i class="bi bi-bullseye fs-3"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0">Visi</h3>
                                </div>
                                <div class="body-text" style="line-height: 1.8; color: #4b5563;">
                                    {!! $visiMisi->visi !!}
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan: MISI --}}
                        <div class="col-md-7">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm h-100">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                        {{-- Icon List Tugas/Langkah --}}
                                        <i class="bi bi-list-check fs-3"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0">Misi</h3>
                                </div>
                                <div class="body-text" style="line-height: 1.8; color: #4b5563;">
                                    {!! $visiMisi->misi !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="col-md-8 text-center py-5" data-aos="fade-up">
                                <i class="bi bi-info-circle display-1 text-muted opacity-25"></i>
                                <h3 class="fw-bold text-dark mt-3">Data Belum Tersedia</h3>
                                <p class="text-muted">Informasi sedang dalam tahap pembaruan.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

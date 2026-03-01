@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #14532d) 0%, #0f3f21 100%);">
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
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="konten-profil bg-white p-4 p-md-5 rounded-4 shadow-sm">
                                @if ($visiMisi->visi ?? null)
                                    <h4 class="fw-bold mb-3">Visi</h4>
                                    <p class="mb-4">{!! $visiMisi->visi !!}</p>
                                @endif
                                @if ($visiMisi->misi ?? null)
                                    <h4 class="fw-bold mb-3">Misi</h4>
                                    <div class="body-text">{!! $visiMisi->misi !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                                <div class="card-body py-5 text-muted">
                                    <p class="mb-0">Konten visi & misi akan ditampilkan di sini setelah diisi melalui
                                        panel admin (Filament).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

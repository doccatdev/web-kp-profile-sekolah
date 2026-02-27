@extends('layouts.layouts')

@section('content')
    <section id="visi-misi" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5">
                <h1 class="fw-bold">Visi & Misi</h1>
                <p class="text-muted">Visi dan Misi SMP Al Husainiyah</p>
            </div>
            <div class="content-section" data-aos="fade-up">
                @if (isset($visiMisi) && $visiMisi)
                    {{-- Nanti: data dari Filament CRUD --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="konten-profil">
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
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-5 text-center text-muted">
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

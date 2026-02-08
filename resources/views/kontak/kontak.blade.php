@extends('layouts.layouts')

@section('content')
    <section id="kontak" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5">
                <h1 class="fw-bold">Hubungi Kami</h1>
            </div>

            <div class="row g-4" data-aos="fade-up">
                {{-- Info Kontak (dari CRUD) --}}
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h5 class="fw-bold mb-4">Kontak Kami</h5>
                            @if (isset($kontak) && $kontak)
                                <ul class="list-unstyled mb-0">
                                    @if ($kontak->telepon ?? null)
                                        <li class="mb-3">
                                            <i class="bi bi-telephone-fill me-2 text-success"></i>
                                            <a href="tel:{{ preg_replace('/\s+/', '', $kontak->telepon) }}"
                                                class="text-decoration-none text-dark">{{ $kontak->telepon }}</a>
                                        </li>
                                    @endif
                                    @if ($kontak->email ?? null)
                                        <li class="mb-3">
                                            <i class="bi bi-envelope-fill me-2 text-success"></i>
                                            <a href="mailto:{{ $kontak->email }}"
                                                class="text-decoration-none text-dark">{{ $kontak->email }}</a>
                                        </li>
                                    @endif
                                    @if ($kontak->alamat ?? null)
                                        <li class="mb-3">
                                            <i class="bi bi-geo-alt-fill me-2 text-success"></i>
                                            <span>{{ $kontak->alamat }}</span>
                                        </li>
                                    @endif
                                    @if (
                                        ($kontak->facebook ?? null) ||
                                            ($kontak->instagram ?? null) ||
                                            ($kontak->youtube ?? null) ||
                                            ($kontak->tiktok ?? null))
                                        <li class="mt-4 pt-3 border-top">
                                            <span class="d-block mb-2 small text-muted">Media Sosial</span>
                                            <div class="d-flex gap-3 flex-wrap">
                                                @if ($kontak->facebook ?? null)
                                                    <a href="{{ $kontak->facebook }}" target="_blank" rel="noopener"
                                                        class="text-decoration-none text-dark" aria-label="Facebook"><i
                                                            class="bi bi-facebook fs-5"></i></a>
                                                @endif
                                                @if ($kontak->instagram ?? null)
                                                    <a href="{{ $kontak->instagram }}" target="_blank" rel="noopener"
                                                        class="text-decoration-none text-dark" aria-label="Instagram"><i
                                                            class="bi bi-instagram fs-5"></i></a>
                                                @endif
                                                @if ($kontak->youtube ?? null)
                                                    <a href="{{ $kontak->youtube }}" target="_blank" rel="noopener"
                                                        class="text-decoration-none text-dark" aria-label="YouTube"><i
                                                            class="bi bi-youtube fs-5"></i></a>
                                                @endif
                                                @if ($kontak->tiktok ?? null)
                                                    <a href="{{ $kontak->tiktok }}" target="_blank" rel="noopener"
                                                        class="text-decoration-none text-dark" aria-label="TikTok"><i
                                                            class="bi bi-tiktok fs-5"></i></a>
                                                @endif
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            @else
                                {{-- Fallback sampai data dari Filament CRUD tersedia --}}
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3">
                                        <i class="bi bi-telephone-fill me-2 text-success"></i>
                                        <span>(022) 2041235</span>
                                    </li>
                                    <li class="mb-3">
                                        <i class="bi bi-envelope-fill me-2 text-success"></i>
                                        <a href="mailto:smp.alhusainiyyah@gmail.com"
                                            class="text-decoration-none text-dark">smp.alhusainiyyah@gmail.com</a>
                                    </li>
                                    <li class="mb-0">
                                        <i class="bi bi-geo-alt-fill me-2 text-success"></i>
                                        <span>Jl. Bukit Jarian Dalam No. 29/165 D Ciumbuleuit</span>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Peta Google Maps (dari CRUD: embed_url atau latitude + longitude) --}}
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        @if (isset($kontak) && $kontak)
                            @if ($kontak->embed_url ?? null)
                                {{-- Admin menyimpan iframe embed dari Google Maps (Share > Embed a map) --}}
                                <div class="ratio ratio-16x9">
                                    {!! $kontak->embed_url !!}
                                </div>
                            @elseif(($kontak->latitude ?? null) && ($kontak->longitude ?? null))
                                {{-- Admin menyimpan lat/lng, tampilkan via iframe Google Maps embed --}}
                                <div class="ratio ratio-16x9">
                                    <iframe
                                        src="https://www.google.com/maps?q={{ $kontak->latitude }},{{ $kontak->longitude }}&output=embed"
                                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                        class="w-100 h-100" title="Lokasi SMP Al Husainiyah"></iframe>
                                </div>
                            @else
                                <div
                                    class="card-body d-flex align-items-center justify-content-center min-vh-25 text-muted py-5">
                                    <p class="mb-0 text-center small">Pinpoint lokasi akan tampil di sini setelah diatur di
                                        admin (Google Maps).</p>
                                </div>
                            @endif
                        @else
                            {{-- Placeholder: belum ada data kontak dari CRUD --}}
                            <div
                                class="card-body d-flex align-items-center justify-content-center min-vh-25 text-muted py-5">
                                <p class="mb-0 text-center small">Peta lokasi (Google Maps) akan ditampilkan di sini setelah
                                    diisi melalui panel admin (Filament) dengan pinpoint.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

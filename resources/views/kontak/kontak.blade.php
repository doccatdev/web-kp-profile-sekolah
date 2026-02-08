@extends('layouts.layouts')

@section('content')
    {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <section id="kontak" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold">Hubungi Kami</h1>
                <p class="text-muted">Silakan hubungi kami melalui informasi di bawah ini atau kunjungi lokasi kami.</p>
            </div>

            {{-- DETAIL KONTAK HORIZONTAL --}}
            <div class="row g-4 mb-5" data-aos="fade-up">
                @if ($kontak)
                    {{-- Alamat --}}
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                            <div class="d-flex align-items-start">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                    <small class="text-muted d-block small">Alamat</small>
                                    <span class="text-dark fw-medium">{{ $kontak->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                            <div class="d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </div>
                                <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                    <small class="text-muted d-block small">Email</small>
                                    <a href="mailto:{{ $kontak->email }}"
                                        class="fw-medium text-dark text-decoration-none d-block">
                                        {{ $kontak->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-3 contact-card">
                            <div class="d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                    <small class="text-muted d-block small">Telepon</small>
                                    <a href="tel:{{ preg_replace('/\s+/', '', $kontak->phone) }}"
                                        class="fw-medium text-dark text-decoration-none d-block">
                                        {{ $kontak->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 text-center text-muted">
                        <p>Data kontak belum tersedia di database.</p>
                    </div>
                @endif
            </div>

            {{-- PETA FULL WIDTH --}}
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-12">
                    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($kontak && $kontak->location)
                const lat = {{ $kontak->location['lat'] ?? -6.880105400263303,  }};
                const lng = {{ $kontak->location['lng'] ?? 107.60658322895878 }};

                const map = L.map('map').setView([lat, lng], 17);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                const marker = L.marker([lat, lng]).addTo(map);

                marker.bindPopup(`
                    <div style="text-align: center; padding: 5px;">
                        <strong style="color: #198754; font-size: 14px;">SMP Al Husainiyah</strong><br>
                        <span style="font-size: 12px; color: #666;">{{ $kontak->address }}</span>
                    </div>
                `).openPopup();
            @endif
        });
    </script>
@endsection

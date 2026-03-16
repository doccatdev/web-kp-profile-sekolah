@extends('layouts.layouts')

@section('content')
    <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: #009b4d;">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold shadow-sm">Pendidik
                Profesional</span>
            <h1 class="display-4 fw-bold">Data Guru</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;">Guru profesional dan berdedikasi tinggi yang siap membimbing siswa meraih prestasi gemilang</p>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                @forelse ($guru as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                        <div class="card-guru-alt shadow-sm">
                            <div class="card-header-bg"></div>
                            <div class="card-body">
                                <div class="avatar-wrapper">
                                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/images/default-avatar.jpg') }}"
                                        class="avatar-img" alt="{{ $item->nama }}" loading="lazy">
                                </div>

                                <h6 class="guru-name text-dark">{{ $item->nama }}</h6>

                                <div class="role-container">
                                    <div class="role-text">
                                        {{-- 1. Tampilkan Jabatan apa adanya (Sesuai yang lu ketik di Admin) --}}
                                        {{ $item->jabatan }}

                                        @php
                                            // Cek validitas Mapel
                                            $mapel = trim($item->mata_pelajaran);
                                            $isMapelValid = !empty($mapel) && strtolower($mapel) !== 'null';
                                        @endphp

                                        {{-- 2. Tampilkan Mapel cuma kalau ada isinya, TANPA nambahin slash lagi --}}
                                        @if ($isMapelValid)
                                            <br> {{ $mapel }}
                                        @endif
                                    </div>
                                </div>

                                <a href="{{ route('profil.data-guru.detail', $item->slug) }}" class="btn-lihat">
                                    Lihat Profil <i class="bi bi-chevron-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Data belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

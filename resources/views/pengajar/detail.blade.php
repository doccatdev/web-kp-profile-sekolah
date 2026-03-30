@extends('layouts.layouts')

@section('content')
<section class="py-5 bg-white" style="margin-top: 100px; min-height: 80vh;">
    <div class="container py-5">
        <div class="row align-items-start g-5">
            
            {{-- Kolom Kiri: Foto Profil --}}
            <div class="col-md-4 text-center text-md-start">
                <img src="{{ $data->foto ? asset('storage/' . $data->foto) : asset('assets/images/default-avatar.jpg') }}" 
                     class="img-fluid shadow-sm" 
                     style="width: 100%; max-width: 350px; height: auto; border-radius: 4px;" 
                     alt="{{ $data->nama }}">
            </div>

            {{-- Kolom Kanan: Detail Info --}}
            <div class="col-md-8">
                <div class="detail-info">
                    {{-- Nama Guru --}}
                    <h1 class="fw-bold mb-4 text-dark" style="font-size: 2.5rem;">{{ $data->nama }}</h1>
                    
                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label class="fw-bold d-block text-dark small text-uppercase">Jabatan</label>
                        <p class="text-muted fs-5">{{ $data->jabatan }}</p>
                    </div>

                    {{-- Mata Pelajaran --}}
                    <div class="mb-3">
                        <label class="fw-bold d-block text-dark small text-uppercase">Mata Pelajaran</label>
                        <p class="text-muted fs-5">{{ $data->mata_pelajaran ?? '-' }}</p>
                    </div>

                    {{-- Tombol Kembali - Hijau Emerald --}}
                    <div class="mt-5">
                        <a href="{{ route('profil.data-guru.index') }}" 
                           class="btn text-white px-4 py-2 shadow-sm fw-bold" 
                           style="background-color: #50C878; border-color: #50C878;">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
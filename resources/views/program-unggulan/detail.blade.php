@extends('layouts.layouts')

@section('content')
    <section id="program-unggulan-detail" class="pt-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-4" data-aos="fade-up">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                        class="text-decoration-none text-danger">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/program-unggulan') }}"
                                        class="text-decoration-none text-danger">Program Unggulan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $program->title }}</li>
                            </ol>
                        </nav>
                        <h1 class="fw-bold">{{ $program->title }}</h1>
                    </div>

                    <div class="card border-0 shadow-sm overflow-hidden mb-5" data-aos="fade-up">
                        <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg') }}"
                            class="img-fluid w-100" alt="{{ $program->title }}"
                            style="max-height: 500px; object-fit: cover;">
                        <div class="card-body p-4 p-md-5">
                            <div class="content body-text">
                                {!! $program->description !!}
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ url('/program-unggulan') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Program
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

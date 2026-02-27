@extends('layouts.layouts')

@section('content')
    <section id="pengumuman" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold">Agenda</h1>
                <p class="text-muted">Agenda terbaru dari SMP Al Husainiyah</p>
                <div class="stripe-red mx-auto"
                    style="width: 100px; height: 4px; background-color: #dc3545; margin-top: 10px;"></div>
            </div>

            <div class="content-section" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5 text-center text-muted">
                                <i class="bi bi-megaphone-fill fs-1 mb-3 d-block text-success"></i>
                                <p class="mb-0">Agenda akan ditampilkan di sini setelah diisi melalui panel admin
                                    (Filament).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

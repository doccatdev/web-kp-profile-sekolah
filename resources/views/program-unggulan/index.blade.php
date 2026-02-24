@extends('layouts.layouts')

@section('content')
    <section id="program-unggulan" class="pt-5">
        <div class="container py-5">
            <div class="header-section text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold">Program Unggulan</h1>
                <p class="text-muted">Program unggulan SMP Al Husainiyah untuk mencetak generasi berkualitas</p>
                <div class="stripe-red mx-auto"
                    style="width: 100px; height: 4px; background-color: #dc3545; margin-top: 10px;"></div>
            </div>

            <div class="row g-4">
                @if (isset($flagshipPrograms) && $flagshipPrograms->count() > 0)
                    @foreach ($flagshipPrograms as $program)
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg') }}"
                                    class="card-img-top" alt="{{ $program->title }}"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $program->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit(strip_tags($program->description), 100) }}
                                    </p>
                                    <a href="{{ url('/program-unggulan/' . $program->id) }}"
                                        class="btn btn-outline-danger">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center text-muted">
                        <p>Belum ada program unggulan yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

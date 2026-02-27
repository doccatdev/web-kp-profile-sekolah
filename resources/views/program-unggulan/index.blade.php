@extends('layouts.layouts')

@section('content')
    <!-- Hero Header -->
    <section class="bg-success bg-opacity-10 py-5 mt-5">
        <div class="container py-4">
            <div class="text-center" data-aos="fade-up">
                <span class="badge bg-success mb-2 px-3 py-2 rounded-pill">Kurikulum & Kegiatan</span>
                <h1 class="fw-bold display-5 text-dark">Program Unggulan</h1>
                <p class="text-muted mt-3 mb-0 mx-auto" style="max-width: 600px;">
                    Program komprehensif SMP Al-Husainiyyah yang dirancang khusus untuk memaksimalkan potensi akademik,
                    karakter islami, dan keterampilan hidup siswa.
                </p>
                <div class="stripe-emerald mx-auto mt-4" style="width: 80px;"></div>
            </div>
        </div>
    </section>

    <!-- Program Grid Section -->
    <section id="program-unggulan-list" class="py-5 bg-light">
        <div class="container pb-5">
            <div class="row g-4 justify-content-center">
                @if (isset($flagshipPrograms) && $flagshipPrograms->count() > 0)
                    @foreach ($flagshipPrograms as $program)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ url('/program-unggulan/' . $program->id) }}" class="text-decoration-none">
                                <div
                                    class="card border-0 rounded-4 overflow-hidden program-card shadow-sm h-100 position-relative bg-white">
                                    <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg') }}"
                                        class="card-img h-100 object-fit-cover w-100" alt="{{ $program->title }}"
                                        style="min-height: 400px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                                    <div class="program-overlay d-flex flex-column justify-content-end p-4 text-white">
                                        <div
                                            class="bg-success text-white px-3 py-1 rounded-pill small fw-bold mb-3 w-auto align-self-start">
                                            Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                        </div>
                                        <h4 class="fw-bold mb-2">{{ $program->title }}</h4>
                                        <p
                                            class="small text-light mb-0 opacity-0 translate-y-4 transition-all program-desc">
                                            {{ Str::limit(strip_tags($program->description), 120) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    {{-- Dummy Data Placeholder for Frontend Focus --}}
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <a href="#" class="text-decoration-none">
                                <div
                                    class="card border-0 rounded-4 overflow-hidden program-card shadow-sm h-100 position-relative bg-white">
                                    <img src="{{ asset('assets/images/activity-0' . ($i > 3 ? 1 : $i) . '.jpg') }}"
                                        class="card-img h-100 object-fit-cover w-100" alt="Program Setup"
                                        style="min-height: 400px;">
                                    <div class="program-overlay d-flex flex-column justify-content-end p-4 text-white">
                                        <h4 class="fw-bold mb-2">Program Unggulan {{ $i }}</h4>
                                        <p
                                            class="small text-light mb-0 opacity-0 translate-y-4 transition-all program-desc">
                                            Contoh deskripsi singkat mengenai program unggulan yang berjalan di SMP
                                            Al-Husainiyyah untuk mencetak generasi cerdas.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>
@endsection

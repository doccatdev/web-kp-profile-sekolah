@extends('layouts.layouts')

@section('content')
    <!-- Page Header CSS Gradient Version for Performance -->
    <section class="py-5 text-white pt-5"
        style="margin-top: 76px; background: linear-gradient(135deg, var(--emerald-green, #009b4d) 0%, #0f3f21 100%);">
        <div class="container py-5 text-center">
            <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                data-aos="fade-down">Kurikulum & Kegiatan</span>
            <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Program Unggulan</h1>
            <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="200">
                Program komprehensif SMP Al-Husainiyyah yang dirancang khusus untuk memaksimalkan potensi akademik, karakter
                islami, dan keterampilan siswa.
            </p>
        </div>
    </section>

    <!-- Program Grid Section -->
    <section id="program-unggulan-list" class="py-5 bg-light">
        <div class="container pb-5">
            <div class="row g-4 justify-content-center">
                @if (isset($flagshipPrograms) && $flagshipPrograms->count() > 0)
                    @foreach ($flagshipPrograms as $program)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                                style="cursor:pointer;">
                                <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('assets/images/activity-01.jpg') }}"
                                    class="w-100 object-fit-cover" style="height: 350px;" alt="{{ $program->title }}">
                                <div class="ig-overlay"></div>
                                <div class="position-absolute bottom-0 start-0 p-4 text-white" style="z-index:2;">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                                class="bi bi-star-fill fs-5"></i></div>
                                        <span class="badge bg-success bg-opacity-75 rounded-pill small">Program
                                            Unggulan</span>
                                    </div>
                                    <h5 class="fw-bold mb-1">{{ $program->title }}</h5>
                                    <p class="small opacity-75 mb-3">{{ Str::limit(strip_tags($program->description), 80) }}
                                    </p>
                                    <a href="{{ url('/program-unggulan/' . $program->id) }}"
                                        class="btn btn-outline-light btn-sm rounded-pill px-4">Lihat Detail <i
                                            class="bi bi-chevron-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Dummy Data Placeholder for Frontend Focus --}}
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="feature-card position-relative rounded-4 overflow-hidden shadow h-100"
                                style="cursor:pointer;">
                                <img src="{{ asset('assets/images/activity-0' . ($i > 3 ? 1 : $i) . '.jpg') }}"
                                    class="w-100 object-fit-cover" style="height: 350px;"
                                    alt="Program Unggulan {{ $i }}">
                                <div class="ig-overlay"></div>
                                <div class="position-absolute bottom-0 start-0 p-4 text-white" style="z-index:2;">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="bg-white bg-opacity-20 rounded-3 p-2 d-inline-flex"><i
                                                class="bi bi-star-fill fs-5"></i></div>
                                        <span class="badge bg-success bg-opacity-75 rounded-pill small">Program
                                            Unggulan</span>
                                    </div>
                                    <h5 class="fw-bold mb-1">Program Unggulan {{ $i }}</h5>
                                    <p class="small opacity-75 mb-3">Deskripsi singkat mengenai program unggulan ini yang
                                        dirancang untuk mencetak generasi cerdas dan religious.</p>
                                    <a href="{{ url('/program-unggulan/program-dummy-' . $i) }}"
                                        class="btn btn-outline-light btn-sm rounded-pill px-4">Lihat Detail <i
                                            class="bi bi-chevron-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    #editor {
        height: 400px;
        font-size: 1.1rem;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        background: white;
    }
    .ql-toolbar {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        background: #f8f9fa;
    }
</style>

<div class="container py-5" style="margin-top: 80px;">
    <div class="row justify-content-center">
        <div class="col-md-9">

            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 class="fw-bold mb-4">{{ isset($news) ? '✍️ Edit Artikel' : '🚀 Tulis Artikel Baru' }}</h2>

            <form action="{{ isset($news) ? route('berita.update', $news) : route('berita.store') }}" 
                  method="POST" 
                  id="newsForm"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($news)) @method('PUT') @endif

                {{-- Judul --}}
                <div class="mb-4">
                    <input type="text" name="news_title" 
                           class="form-control form-control-lg border-0 border-bottom rounded-0 shadow-none px-0" 
                           style="font-size: 2.5rem; font-weight: bold; background: transparent;"
                           placeholder="Judul Berita..." 
                           value="{{ old('news_title', $news->news_title ?? '') }}" required>
                </div>

                <div class="row mb-4">
                    {{-- Kategori --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="category_id" class="form-select border-0 shadow-sm rounded-3" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" 
                                    {{ (old('category_id', $news->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                                    {{ $cat->name_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Terbit (Fitur Baru) --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Tanggal Terbit</label>
                        <input type="date" name="posted_at" 
                               class="form-control border-0 shadow-sm rounded-3" 
                               value="{{ old('posted_at', isset($news) ? \Carbon\Carbon::parse($news->posted_at)->format('Y-m-d') : date('Y-m-d')) }}" 
                               required>
                    </div>

                    {{-- Image Upload --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Thumbnail (Max 2MB)</label>
                        <input type="file" name="image" class="form-control border-0 shadow-sm rounded-3">
                        @if(isset($news->image))
                            <small class="text-muted d-block mt-1">File: {{ basename($news->image) }}</small>
                        @endif
                    </div>
                </div>

                {{-- Editor Content --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">Isi Berita</label>
                    <input type="hidden" name="news_content" id="news_content" value="{{ old('news_content', $news->news_content ?? '') }}">
                    
                    <div id="editor">
                        {!! old('news_content', $news->news_content ?? '') !!}
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('berita.index') }}" class="text-muted text-decoration-none">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success px-5 py-2 rounded-pill shadow-sm fw-bold">
                        {{ isset($news) ? 'Simpan Perubahan' : 'Kirim ke Admin' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Mulai menulis cerita Anda...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    var form = document.getElementById('newsForm');
    form.onsubmit = function() {
        var content = document.querySelector('#news_content');
        content.value = quill.root.innerHTML;
    };
</script>
@endsection
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- 1. Halaman Statis --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/profil/profil-sekolah') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/profil/sejarah') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/profil/visi-misi') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/ppdb') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/kontak') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.7</priority>
    </url>

    {{-- 2. Data Dinamis (Sesuai Controller) --}}
    @foreach($news as $item)
    <url>
        <loc>{{ url('/berita/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach($program as $item)
    <url>
        <loc>{{ url('/program-unggulan/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.7</priority>
    </url>
    @endforeach

    @foreach($fasilitas as $item)
    <url>
        <loc>{{ url('/fasilitas/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.6</priority>
    </url>
    @endforeach

    @foreach($prestasi as $item)
    <url>
        <loc>{{ url('/prestasi/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.7</priority>
    </url>
    @endforeach

    @foreach($ekskul as $item)
    <url>
        <loc>{{ url('/ekstrakulikuler/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.6</priority>
    </url>
    @endforeach

    @foreach($guru as $item)
    <url>
        <loc>{{ url('/profil/data-guru/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.5</priority>
    </url>
    @endforeach

    @foreach($pengumuman as $item)
    <url>
        <loc>{{ url('/pengumuman/' . ($item->slug ?? $item->id)) }}</loc>
        <lastmod>{{ optional($item->updated_at)->toAtomString() ?? now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
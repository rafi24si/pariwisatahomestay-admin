<h3 class="fw-bold text-primary mb-4">Detail Kamar</h3>

<div class="card shadow-lg rounded-4 p-4 animate__animated animate__fadeInUp" style="max-width:700px;margin:auto;">
    {{-- Header Foto --}}
    <div class="text-center mb-4">
        @php
            $foto = optional($kamar->media)->first();
        @endphp
        @if($foto)
            <img src="{{ asset('storage/' . $foto->file_url) }}" alt="Foto Kamar" class="rounded shadow-sm img-fluid" style="max-height:250px;object-fit:cover;">
        @else
            <div class="no-image d-flex align-items-center justify-content-center rounded shadow-sm" style="height:250px;background:#e9ecef;color:#6c757d;">
                Tidak ada foto
            </div>
        @endif
    </div>

    {{-- Nama & Homestay --}}
    <h4 class="fw-bold mb-1">{{ $kamar->nama_kamar }}</h4>
    <p class="text-muted mb-3">Bagian dari Homestay: <strong>{{ $kamar->homestay->nama ?? '-' }}</strong></p>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Kapasitas:</strong>
            <p class="mb-0">{{ $kamar->kapasitas }} Orang</p>
        </div>
        <div class="col-md-6">
            <strong>Harga:</strong>
            <p class="mb-0 text-primary fw-semibold">Rp {{ number_format($kamar->harga ?? 0,0,',','.') }}/malam</p>
        </div>
    </div>

    {{-- Fasilitas --}}
    <div class="mb-3">
        <strong>Fasilitas:</strong>
        @php
            $fasilitas = is_array($kamar->fasilitas_json)
                ? $kamar->fasilitas_json
                : json_decode($kamar->fasilitas_json, true) ?? [];
        @endphp

        @if(count($fasilitas) > 0)
            <ul class="list-group list-group-flush mt-2">
                @foreach($fasilitas as $f)
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> {{ $f }}
                    </li>
                @endforeach
            </ul>
        @else
            <span class="text-muted">Tidak ada fasilitas.</span>
        @endif
    </div>

    {{-- Tombol --}}
    <div class="mt-4 text-end">
        <a href="{{ route('kamar.index') }}" class="btn btn-secondary hover-scale">← Kembali</a>
    </div>
</div>

<style>
    .hover-scale {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .hover-scale:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0,123,255,0.3);
    }
    .list-group-item {
        border: none;
        padding-left: 0;
    }
    .no-image {
        font-size: 1rem;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">

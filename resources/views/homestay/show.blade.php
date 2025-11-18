@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="fw-bold mb-3">Detail Homestay</h3>

    <div class="card p-4 shadow-sm rounded-4">

        <h4 class="fw-bold">{{ $data->nama }}</h4>

        <p class="text-muted mb-2">{{ $data->alamat }} (RT {{ $data->rt }} / RW {{ $data->rw }})</p>

        <p><strong>Harga per Malam:</strong> Rp {{ number_format($data->harga_per_malam,0,',','.') }}</p>

        <p><strong>Status:</strong>
            @if($data->status == 'aktif')
                <span class="badge bg-success">Aktif</span>
            @else
                <span class="badge bg-secondary">Nonaktif</span>
            @endif
        </p>

        <p><strong>Fasilitas JSON:</strong></p>
        <pre class="bg-light p-3 rounded-4">{{ $data->fasilitas_json }}</pre>

        <hr>

        <h5 class="fw-semibold mb-3">Foto Homestay</h5>

        <div class="row">
            @forelse($data->media as $m)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('storage/'.$m->file_url) }}"
                         class="img-fluid rounded-4 shadow-sm"
                         style="height:180px; object-fit:cover;">
                </div>
            @empty
                <p class="text-muted">Tidak ada foto.</p>
            @endforelse
        </div>

        <a href="{{ route('homestay.index') }}" class="btn btn-secondary rounded-4 px-3">Kembali</a>

    </div>

</div>
@endsection

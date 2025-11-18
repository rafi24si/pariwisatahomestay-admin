@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- TOMBOL KEMBALI --}}
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3 px-3">
        ← Kembali ke Dashboard
    </a>

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Homestay</h3>
        <a href="{{ route('homestay.create') }}" class="btn btn-primary">Tambah Homestay</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pemilik</th>
                <th>Nama Homestay</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($homestays as $h)
                <tr>
                    <td>{{ $h->homestay_id }}</td>
                    <td>{{ $h->pemilik->nama ?? '-' }}</td>
                    <td>{{ $h->nama }}</td>
                    <td>{{ $h->harga_per_malam }}</td>

                    <td>
                        @if ($h->media->first())
                            <img src="{{ asset('storage/' . $h->media->first()->file_url) }}"
                                width="80" height="60" class="rounded">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('homestay.show', $h->homestay_id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('homestay.edit', $h->homestay_id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('homestay.destroy', $h->homestay_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus homestay?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

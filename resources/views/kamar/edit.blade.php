@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Kamar</h3>

    <form action="{{ route('kamar.update', $kamar->kamar_id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <label>Nama Homestay</label>
        <select name="homestay_id" class="form-control mb-2" required>
            @foreach($homestay as $h)
                <option value="{{ $h->homestay_id }}"
                    {{ $kamar->homestay_id == $h->homestay_id ? 'selected' : '' }}>
                    {{ $h->nama }}
                </option>
            @endforeach
        </select>

        <label>Nama Kamar</label>
        <input type="text" name="nama_kamar" value="{{ $kamar->nama_kamar }}" class="form-control mb-2">

        <label>Kapasitas</label>
        <input type="number" name="kapasitas" value="{{ $kamar->kapasitas }}" class="form-control mb-2">

        <label>Harga</label>
        <input type="number" name="harga" value="{{ $kamar->harga }}" class="form-control mb-2">

        <label>Fasilitas</label>
        <textarea name="fasilitas_json" class="form-control mb-2">{{ $kamar->fasilitas_json }}</textarea>

        <label>Foto Baru</label>
        <input type="file" name="foto" class="form-control mb-3">

        @if($kamar->media->first())
            <img src="{{ asset('storage/'.$kamar->media->first()->file_url) }}" width="120" class="mb-3">
        @endif

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

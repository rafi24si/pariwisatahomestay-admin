@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kamar Homestay</h3>

    <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Homestay</label>
        <select name="homestay_id" class="form-control mb-2" required>
            <option value="">-- Pilih --</option>
            @foreach($homestay as $h)
                <option value="{{ $h->homestay_id }}">{{ $h->nama }}</option>
            @endforeach
        </select>

        <label>Nama Kamar</label>
        <input type="text" name="nama_kamar" class="form-control mb-2" required>

        <label>Kapasitas</label>
        <input type="number" name="kapasitas" class="form-control mb-2">

        <label>Harga</label>
        <input type="number" name="harga" class="form-control mb-2" required>

        <label>Fasilitas</label>
        <textarea name="fasilitas_json" class="form-control mb-2"></textarea>

        <label>Foto</label>
        <input type="file" name="foto" class="form-control mb-3">

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

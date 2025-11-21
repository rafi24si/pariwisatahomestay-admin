<!DOCTYPE html>
<html>

<head>
    <title>Edit Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 bg-light">


    <h3 class="fw-bold text-primary mb-3">Edit Kamar Homestay</h3>


    <form action="{{ route('kamar.update', $kamar->kamar_id) }}" method="POST" enctype="multipart/form-data"
        class="card p-4 shadow-sm bg-white">
        @csrf @method('PUT')


        <label>Homestay</label>
        <select name="homestay_id" class="form-control mb-3">
            @foreach ($homestays as $h)
                <option value="{{ $h->homestay_id }}" {{ $kamar->homestay_id == $h->homestay_id ? 'selected' : '' }}>
                    {{ $h->nama }}</option>
            @endforeach
        </select>


        <label>Nama Kamar</label>
        <input type="text" name="nama_kamar" value="{{ $kamar->nama_kamar }}" class="form-control mb-3">


        <label>Kapasitas</label>
        <input type="number" name="kapasitas" value="{{ $kamar->kapasitas }}" class="form-control mb-3">


        <label>Harga</label>
        <input type="number" name="harga" value="{{ $kamar->harga }}" class="form-control mb-3">


        <label>Fasilitas (pisahkan dengan koma)</label>
        <input type="text" name="fasilitas" value="{{ implode(',', $kamar->fasilitas_json ?? []) }}"
            class="form-control mb-3">


        <label>Foto Lama</label><br>
        @if ($kamar->media)
            <img src="{{ asset('storage/' . $kamar->media) }}" width="100" class="mb-3">
        @endif


        <label>Ganti Foto</label>
        <input type="file" name="media" class="form-control mb-3">


        <button class="btn btn-warning">Update</button>
    </form>


</body>

</html>

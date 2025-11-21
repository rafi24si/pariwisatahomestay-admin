<!DOCTYPE html>
<html>
<head>
<title>Tambah Kamar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">


<h3 class="fw-bold mb-3 text-primary">Tambah Kamar Homestay</h3>


<form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm bg-white">
@csrf


<label>Homestay</label>
<select name="homestay_id" class="form-control mb-3">
@foreach($homestays as $h)
<option value="{{ $h->homestay_id }}">{{ $h->nama }}</option>
@endforeach
</select>


<label>Nama Kamar</label>
<input type="text" name="nama_kamar" class="form-control mb-3">


<label>Kapasitas</label>
<input type="number" name="kapasitas" class="form-control mb-3">


<label>Harga</label>
<input type="number" name="harga" class="form-control mb-3">


<label>Fasilitas (pisahkan dengan koma)</label>
<input type="text" name="fasilitas" class="form-control mb-3">


<label>Foto Kamar</label>
<input type="file" name="media" class="form-control mb-3">


<button class="btn btn-primary">Simpan</button>
</form>


</body>
</html>

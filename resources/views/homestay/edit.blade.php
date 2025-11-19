<!DOCTYPE html>
<html>
<head>
    <title>Edit Homestay</title>
    </head>
<body>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('homestay.update', $homestay->homestay_id) }}" method="POST">
        @csrf
        @method('PUT') <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $homestay->nama) }}" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="{{ old('alamat', $homestay->alamat) }}" required><br>

        <label for="rt">RT:</label>
        <input type="text" name="rt" value="{{ old('rt', $homestay->rt) }}" required><br>

        <label for="rw">RW:</label>
        <input type="text" name="rw" value="{{ old('rw', $homestay->rw) }}" required><br>

        <label for="harga_per_malam">Harga/malam:</label>
        <input type="number" step="0.01" name="harga_per_malam" value="{{ old('harga_per_malam', $homestay->harga_per_malam) }}" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" value="{{ old('status', $homestay->status) }}" required><br>

        <button type="submit">Update Homestay</button>
    </form>

    <hr>
    <a href="/homestay">Kembali ke Daftar Homestay</a>
</body>
</html>

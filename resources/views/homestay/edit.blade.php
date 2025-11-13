<!DOCTYPE html>
<html>
<head><title>Edit Homestay</title></head>
<body>
  <h1>Edit Homestay</h1>
  <form action="/homestay/{{ $homestay->homestay_id }}" method="POST">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="nama" value="{{ old('nama', $homestay->nama) }}"><br>
    Alamat: <input type="text" name="alamat" value="{{ old('alamat', $homestay->alamat) }}"><br>
    RT: <input type="text" name="rt" value="{{ old('rt', $homestay->rt) }}"><br>
    RW: <input type="text" name="rw" value="{{ old('rw', $homestay->rw) }}"><br>
    Harga/malam: <input type="number" step="0.01" name="harga_per_malam" value="{{ old('harga_per_malam', $homestay->harga_per_malam) }}"><br>
    Status: <input type="text" name="status" value="{{ old('status', $homestay->status) }}"><br>
    <button type="submit">Update</button>
  </form>
  <a href="/homestay">Kembali</a>
</body>
</html>

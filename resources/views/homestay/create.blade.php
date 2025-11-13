<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Homestay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #cce5ff, #e6f7ff, #ffffff);
            animation: bgMove 10s infinite alternate ease-in-out;
        }
        @keyframes bgMove {
            0% { background-position: left top; }
            100% { background-position: right bottom; }
        }
        .card-warga { border: none; border-radius: 16px; box-shadow: 0 6px 20px rgba(13, 60, 97, 0.1); overflow: hidden; }
        .card-header-blue { background: linear-gradient(90deg, #0099ff, #66ccff); color: #fff; padding: 20px 24px; }
        .btn-glow { position: relative; overflow: hidden; }
        .btn-glow::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.3); transition: left 0.4s ease; }
        .btn-glow:hover::after { left: 100%; }
        .gradient-card { background: linear-gradient(180deg, #f8fbff, #eaf6ff); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .gradient-card:hover { transform: translateY(-6px); box-shadow: 0px 10px 25px rgba(0, 150, 255, 0.3); }
        .form-control-animated { border-radius: 10px; border: 2px solid #dceeff; transition: all 0.3s ease-in-out; }
        .form-control-animated:focus { border-color: #66b3ff; box-shadow: 0 0 8px rgba(102, 179, 255, 0.6); transform: scale(1.01); }
        .text-sky { color: #007bff; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card card-warga gradient-card">
        <div class="card-header-blue d-flex justify-content-between align-items-center">
            <h4><i class="bi bi-house-add me-2"></i>Tambah Homestay</h4>
            <a href="{{ route('homestay.index') }}" class="btn btn-light btn-glow">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('homestay.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold text-sky">Nama Homestay</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control form-control-animated" placeholder="Masukkan nama homestay">
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-sky">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control form-control-animated" placeholder="Masukkan alamat">
                    @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-sky">RT</label>
                        <input type="text" name="rt" value="{{ old('rt') }}" class="form-control form-control-animated">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-sky">RW</label>
                        <input type="text" name="rw" value="{{ old('rw') }}" class="form-control form-control-animated">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-sky">Fasilitas (JSON)</label>
                    <textarea name="fasilitas_json" class="form-control form-control-animated" rows="3">{{ old('fasilitas_json') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-sky">Harga per Malam</label>
                    <input type="number" name="harga_per_malam" step="0.01" value="{{ old('harga_per_malam') }}" class="form-control form-control-animated">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-glow px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

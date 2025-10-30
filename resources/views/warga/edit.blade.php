@extends('layouts.app')

@section('title', 'Edit Data Warga')

@section('content')
<style>
    .card-form {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(13, 60, 97, 0.1);
        overflow: hidden;
    }
    .card-header-blue {
        background: linear-gradient(90deg, #0d6efd 0%, #2b8cff 100%);
        color: #fff;
        padding: 20px 24px;
        border: none;
    }
    .btn-primary {
        border-radius: 10px;
        padding: 8px 18px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    }
    body {
        background: linear-gradient(135deg, #cce5ff, #e6f7ff, #ffffff);
        animation: bgMove 10s infinite alternate ease-in-out;
    }

    @keyframes bgMove {
        0% { background-position: left top; }
        100% { background-position: right bottom; }
    }

    .bg-sky {
        background: linear-gradient(90deg, #0099ff, #66ccff);
    }

    .text-sky {
        color: #007bff;
    }

    .gradient-card {
        background: linear-gradient(180deg, #f8fbff, #eaf6ff);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gradient-card:hover {
        transform: translateY(-6px);
        box-shadow: 0px 10px 25px rgba(0, 150, 255, 0.3);
    }

    .form-control-animated {
        border-radius: 10px;
        border: 2px solid #dceeff;
        transition: all 0.3s ease-in-out;
    }

    .form-control-animated:focus {
        border-color: #66b3ff;
        box-shadow: 0 0 8px rgba(102, 179, 255, 0.6);
        transform: scale(1.01);
    }

    .hover-zoom {
        transition: all 0.3s ease;
    }

    .hover-zoom:hover {
        transform: scale(1.05);
    }

    .btn-glow {
        position: relative;
        overflow: hidden;
    }

    .btn-glow::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transition: left 0.4s ease;
    }

    .btn-glow:hover::after {
        left: 100%;
    }
</style>

<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header-blue d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Data Warga</h4>
            <a href="{{ route('warga.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Telepon</label>
                        <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert2 untuk notifikasi -->
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    showConfirmButton: false,
    timer: 1800
});
</script>
@endif
@endsection

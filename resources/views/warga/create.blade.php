@extends('layouts.app')

@section('title', 'Tambah Data Warga')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeIn">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Tambah Data Warga</h4>
            <a href="{{ route('warga.index') }}" class="btn btn-light btn-sm rounded-pill">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4 bg-light">
            <form id="form-create" action="{{ route('warga.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control" placeholder="Masukkan nomor KTP" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Contoh: Islam" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Contoh: Guru / Petani">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Telepon</label>
                        <input type="text" name="telp" class="form-control" placeholder="0812-xxxx-xxxx">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Contoh: nama@email.com">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>
                    <button type="button" id="btn-submit" class="btn btn-primary px-4">
                        <i class="bi bi-save2-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Animasi & Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btn-submit').addEventListener('click', function() {
    Swal.fire({
        title: 'Yakin ingin menyimpan?',
        text: 'Pastikan semua data sudah benar.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-create').submit();
        }
    });
});

@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    showConfirmButton: false,
    timer: 1800
});
@endif
</script>

{{-- CSS tambahan --}}
<style>
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
@endsection

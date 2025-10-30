@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeInUp gradient-card">
        <div class="card-header bg-sky d-flex justify-content-between align-items-center rounded-top-4 p-3 animate__animated animate__fadeInDown">
            <h4 class="mb-0 text-white fw-bold"><i class="bi bi-geo-alt-fill me-2"></i>Tambah Destinasi Wisata</h4>
            <a href="{{ route('destinasi.index') }}" class="btn btn-light btn-sm rounded-pill shadow-sm hover-zoom">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4 bg-light animate__animated animate__fadeIn">
            <form id="formDestinasi" action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-sky">Nama Destinasi</label>
                        <input type="text" name="nama" class="form-control form-control-animated" placeholder="Contoh: Pantai Indah" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-sky">Kontak</label>
                        <input type="text" name="kontak" class="form-control form-control-animated" placeholder="0812-xxxx-xxxx" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-sky">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control form-control-animated" placeholder="Alamat lengkap lokasi wisata..." required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-sky">RT</label>
                        <input type="text" name="rt" class="form-control form-control-animated">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-sky">RW</label>
                        <input type="text" name="rw" class="form-control form-control-animated">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-sky">Jam Buka</label>
                        <input type="text" name="jam_buka" class="form-control form-control-animated" placeholder="08.00 - 17.00">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-sky">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control form-control-animated" rows="3" placeholder="Ceritakan keunikan dan daya tarik destinasi..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-sky">Harga Tiket (Rp)</label>
                    <input type="number" name="tiket" class="form-control form-control-animated" step="0.01" placeholder="Contoh: 15000">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-sky">Foto / Cover</label>
                    <input type="file" name="media" class="form-control form-control-animated">
                </div>

                <div class="d-flex justify-content-end mt-4 animate__animated animate__fadeInUp">
                    <button type="reset" id="resetBtn" class="btn btn-outline-secondary me-2 rounded-pill shadow-sm hover-zoom">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm hover-zoom btn-glow">
                        <i class="bi bi-save2-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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

{{-- SweetAlert2 + Animasi --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('formDestinasi').addEventListener('submit', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Simpan Data?',
        text: 'Pastikan data destinasi sudah benar.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0099ff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal',
        backdrop: `
            rgba(0,123,255,0.1)
            left top
            no-repeat
        `
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data destinasi berhasil disimpan.',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(() => e.target.submit(), 1600);
        }
    });
});

document.getElementById('resetBtn').addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Reset Form?',
        text: 'Semua data akan dihapus dari form.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0099ff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Reset!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formDestinasi').reset();
            Swal.fire({
                title: 'Direset!',
                text: 'Form berhasil dikosongkan.',
                icon: 'info',
                timer: 1200,
                showConfirmButton: false
            });
        }
    });
});
</script>

{{-- Tambahan animasi dan ikon --}}
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection

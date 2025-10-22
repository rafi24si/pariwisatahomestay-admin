@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeIn">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h4 class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>Tambah Destinasi Wisata</h4>
            <a href="{{ route('destinasi.index') }}" class="btn btn-light btn-sm rounded-pill">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4 bg-light">
            <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Destinasi</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Pantai Indah" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kontak</label>
                        <input type="text" name="kontak" class="form-control" placeholder="0812-xxxx-xxxx" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap lokasi wisata..." required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">RT</label>
                        <input type="text" name="rt" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">RW</label>
                        <input type="text" name="rw" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Jam Buka</label>
                        <input type="text" name="jam_buka" class="form-control" placeholder="08.00 - 17.00">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Ceritakan keunikan dan daya tarik destinasi..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga Tiket (Rp)</label>
                    <input type="number" name="tiket" class="form-control" step="0.01" placeholder="Contoh: 15000">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto / Cover</label>
                    <input type="file" name="media" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save2-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Tambahkan animasi CSS --}}
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">

{{-- Bootstrap 5 Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection

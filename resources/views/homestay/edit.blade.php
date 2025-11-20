@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeInUp gradient-card">
            <div class="card-header bg-sky text-white rounded-top-4 p-3 animate__animated animate__fadeInDown">
                <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Homestay</h4>
            </div>

            <div class="card-body bg-light animate__animated animate__fadeIn">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('homestay.update', $homestay->homestay_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="pemilik_warga_id" class="form-label fw-semibold">Pemilik Warga</label>
                        <select name="pemilik_warga_id" class="form-select" required>
                            <option value="">-- Pilih Pemilik --</option>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}"
                                    {{ old('pemilik_warga_id', $homestay->pemilik_warga_id) == $w->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Homestay</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $homestay->nama) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <input type="text" name="alamat" class="form-control"
                            value="{{ old('alamat', $homestay->alamat) }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="rt" class="form-label fw-semibold">RT</label>
                            <input type="text" name="rt" class="form-control" value="{{ old('rt', $homestay->rt) }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="rw" class="form-label fw-semibold">RW</label>
                            <input type="text" name="rw" class="form-control" value="{{ old('rw', $homestay->rw) }}"
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga_per_malam" class="form-label fw-semibold">Harga / Malam</label>
                        <input type="number" step="0.01" name="harga_per_malam" class="form-control"
                            value="{{ old('harga_per_malam', $homestay->harga_per_malam) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <input type="text" name="status" class="form-control"
                            value="{{ old('status', $homestay->status) }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('homestay.index') }}" class="btn btn-secondary hover-zoom shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary hover-zoom shadow-sm">
                            <i class="bi bi-check-circle"></i> Update Homestay
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .gradient-card {
            background: linear-gradient(180deg, #f8fbff, #eaf6ff);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gradient-card:hover {
            transform: translateY(-6px);
            box-shadow: 0px 10px 25px rgba(0, 150, 255, 0.3);
        }

        .bg-sky {
            background: linear-gradient(90deg, #0099ff, #66ccff);
        }

        .hover-zoom {
            transition: all 0.3s ease;
        }

        .hover-zoom:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }

        .form-control,
        .form-select {
            border-radius: 0.75rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1800,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection

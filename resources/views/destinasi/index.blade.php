@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeInUp gradient-card">
        <div class="card-header bg-sky text-white d-flex justify-content-between align-items-center rounded-top-4 p-3 animate__animated animate__fadeInDown">
            <h4 class="mb-0 fw-bold"><i class="bi bi-map-fill me-2"></i>Data Destinasi Wisata</h4>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-light text-dark fw-bold rounded-pill hover-zoom shadow-sm">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>

                <a href="{{ route('destinasi.create') }}" class="btn btn-light text-primary fw-bold rounded-pill hover-zoom shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Destinasi
                </a>
            </div>
        </div>


        <div class="card-body bg-light animate__animated animate__fadeIn">
    <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
        <table class="table table-hover align-middle text-center shadow-sm rounded-3 overflow-hidden">
            <thead class="table-primary text-white bg-sky">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jam Buka</th>
                        <th>Tiket (Rp)</th>
                        <th>Kontak</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                        <tr class="animate__animated animate__fadeInUp">
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jam_buka }}</td>
                            <td>{{ number_format($item->tiket, 0, ',', '.') }}</td>
                            <td>{{ $item->kontak }}</td>

                            <td>
                                @if($item->media)
                                    <img src="{{ asset('storage/' . $item->media) }}" width="70" class="rounded shadow-sm border border-2 border-light">
                                @else
                                    <span class="text-muted">-</span>
                                @endif

                                {{-- ========================================= --}}
                                {{-- TAMBAHAN TOMBOL LIHAT FOTO (TANPA UBAH APAPUN) --}}
                                @if($item->media)

                                    <br>
                                    <a href="{{ route('destinasi.show', $item->destinasi_id) }}"
                                       class="btn btn-primary btn-sm rounded-pill mt-2">
                                        Lihat Foto
                                    </a>
                                @endif
                                {{-- ========================================= --}}
                            </td>

                            <td>
                                <a href="{{ route('destinasi.edit', $item->destinasi_id) }}" class="btn btn-outline-primary btn-sm rounded-pill hover-zoom">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('destinasi.destroy', $item->destinasi_id) }}" method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill hover-zoom btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4 animate__animated animate__fadeIn">Belum ada data destinasi wisata</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

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

    .gradient-card {
        background: linear-gradient(180deg, #f8fbff, #eaf6ff);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gradient-card:hover {
        transform: translateY(-6px);
        box-shadow: 0px 10px 25px rgba(0, 150, 255, 0.3);
    }

    .hover-zoom {
        transition: all 0.3s ease;
    }

    .hover-zoom:hover {
        transform: scale(1.07);
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-primary {
        background: linear-gradient(90deg, #007bff, #66b2ff);
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
    .table-responsive::-webkit-scrollbar {
    width: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #0099ff;
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #007bff;
}
.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('form');
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data ini tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0099ff',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            backdrop: `
                rgba(0,123,255,0.1)
                left top
                no-repeat
            `
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    timer: 1200,
                    showConfirmButton: false
                });
                setTimeout(() => form.submit(), 1300);
            }
        });
    });
});
</script>

<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection

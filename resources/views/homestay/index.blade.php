@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Tombol Kembali --}}
    <a href="{{ route('dashboard') }}" class="btn btn-light mb-4 hover-scale">
        ← Kembali ke Dashboard
    </a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Data Homestay</h3>
        <a href="{{ route('homestay.create') }}" class="btn btn-primary hover-scale">
            Tambah Homestay
        </a>
    </div>

    <div class="row g-4">
        @forelse ($homestays as $h)
            <div class="col-md-4">
                <div class="homestay-card p-3 rounded-4 shadow-sm hover-lift">
                    <div class="card-img mb-3">
                        @if ($h->media->first())
                            <img src="{{ asset('storage/' . $h->media->first()->file_url) }}" alt="Foto Homestay"
                                class="img-fluid rounded-3">
                        @else
                            <div class="no-image d-flex align-items-center justify-content-center">
                                Tidak ada foto
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold mb-1">{{ $h->nama }}</h5>
                    <p class="mb-1 text-muted">Pemilik: {{ $h->pemilik->nama ?? '-' }}</p>
                    <p class="mb-2 fw-semibold text-primary">Rp
                        {{ number_format($h->harga_per_malam ?? 0, 0, ',', '.') }}/malam</p>

                    <div class="d-flex justify-content-between gap-2 mt-2">
                        <a href="{{ route('homestay.show', $h->homestay_id) }}"
                            class="btn btn-info btn-sm hover-scale">Detail</a>
                        <a href="{{ route('homestay.edit', $h->homestay_id) }}"
                            class="btn btn-warning btn-sm hover-scale">Edit</a>
                        <form action="{{ route('homestay.destroy', $h->homestay_id) }}" method="POST" class="d-inline form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm hover-scale btn-delete">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center text-muted py-5">
                    Tidak ada data homestay.
                </div>
            </div>
        @endforelse
    </div>

</div>

<style>
    .homestay-card {
        background-color: #ffffff;
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 1rem;
        cursor: default;
    }

    .homestay-card .card-img img {
        max-height: 180px;
        object-fit: cover;
        width: 100%;
    }

    .no-image {
        height: 180px;
        background-color: #e9ecef;
        border-radius: 0.75rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .homestay-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }

    .hover-scale {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .hover-scale:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
    }

    .homestay-card h5 {
        font-size: 1.1rem;
    }

    .homestay-card p {
        margin-bottom: 0.25rem;
    }
</style>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0099ff',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
@endsection

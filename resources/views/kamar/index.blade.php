@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        {{-- Tombol Kembali --}}
        <a href="{{ route('dashboard') }}" class="btn btn-light mb-4 hover-scale">
            ← Kembali ke Dashboard
        </a>

        <div class="mb-3">
            <h3 class="fw-bold text-primary mb-1">Data Kamar Homestay</h3>

            {{-- Pagination --}}
            <div class="pagination-wrap mb-2">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('kamar.create') }}" class="btn btn-primary hover-scale">
                    Tambah Kamar
                </a>
            </div>
        </div>

        {{-- GROUP BY HOMESTAY --}}
        @php
            $grouped = $data->groupBy('homestay_id');
        @endphp

        @forelse ($grouped as $homestayId => $kamarList)
            <div class="mb-4 mt-4">
                {{-- Header Homestay --}}
                <h4 class="fw-bold text-secondary mb-3">
                    <i class="bi bi-house-door-fill me-1"></i>
                    {{ $kamarList->first()->homestay->nama ?? 'Homestay Tidak Diketahui' }}
                </h4>

                <div class="row g-4">
                    @foreach ($kamarList as $k)
                        <div class="col-md-4">
                            <div class="homestay-card p-3 rounded-4 shadow-sm hover-lift">

                                {{-- Foto --}}
                                <div class="card-img mb-3">
                                    @php $foto = optional($k->media)->first(); @endphp

                                    @if ($foto)
                                        <img src="{{ asset('storage/' . $foto->file_url) }}" alt="Foto Kamar"
                                            class="img-fluid rounded-3">
                                    @else
                                        <div class="no-image d-flex align-items-center justify-content-center">
                                            Tidak ada foto
                                        </div>
                                    @endif
                                </div>

                                {{-- Nama Kamar --}}
                                <h5 class="fw-bold mb-2">{{ $k->nama_kamar }}</h5>

                                {{-- Kapasitas --}}
                                <p class="mb-1 text-muted">
                                    <i class="bi bi-people-fill me-1"></i>
                                    Kapasitas: {{ $k->kapasitas }} orang
                                </p>

                                {{-- Harga --}}
                                <p class="fw-semibold text-primary mb-3">
                                    <i class="bi bi-cash-coin me-1"></i>
                                    Rp {{ number_format($k->harga ?? 0, 0, ',', '.') }}/malam
                                </p>

                                {{-- Actions --}}
                                <div class="d-flex justify-content-between gap-2 mt-2">
                                    <a href="{{ route('kamar.show', $k->kamar_id) }}"
                                        class="btn btn-info btn-sm hover-scale">Detail</a>

                                    <a href="{{ route('kamar.edit', $k->kamar_id) }}"
                                        class="btn btn-warning btn-sm hover-scale">Edit</a>

                                    <form action="{{ route('kamar.destroy', $k->kamar_id) }}" method="POST"
                                        class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm hover-scale btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @empty
            <div class="text-center text-muted py-5">
                Tidak ada data kamar.
            </div>
        @endforelse

    </div>

    {{-- STYLE --}}
    <style>
        /* === CARD BASE === */
        .homestay-card {
            background: #ffffff;
            border-radius: 1.3rem;
            padding: 1.2rem;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        /* Hover efek modern */
        .homestay-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        /* Ribbon “Kamar” kecil opsional */
        .homestay-card::before {
            content: "Kamar";
            position: absolute;
            top: 0;
            left: 0;
            background: #0d6efd;
            padding: 4px 14px;
            border-bottom-right-radius: 10px;
            font-size: 0.7rem;
            color: white;
            font-weight: 600;
            letter-spacing: .5px;
            opacity: 0.9;
        }

        /* === GAMBAR === */
        .homestay-card .card-img img {
            max-height: 190px;
            width: 100%;
            object-fit: cover;
            border-radius: 1rem;
            transition: transform .4s ease;
        }

        /* Zoom halus */
        .homestay-card:hover .card-img img {
            transform: scale(1.04);
        }

        /* Kotak no image */
        .no-image {
            height: 190px;
            background: linear-gradient(135deg, #dfe6ef, #cfd7df);
            border-radius: 1rem;
            display: flex;
            font-weight: 600;
            font-size: .9rem;
            color: #6c757d;
            letter-spacing: 0.5px;
            animation: shimmer 2s infinite linear;
        }

        /* Efek shimmer */
        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: 200px 0;
            }
        }

        /* === TEKS === */
        .homestay-card h5 {
            font-weight: 700;
            font-size: 1.15rem;
            color: #212529;
        }

        .homestay-card p {
            margin: 0;
            font-size: .92rem;
        }

        .homestay-card .harga {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0d6efd;
        }

        /* === TOMBOL === */
        .btn-sm {
            padding: 6px 12px;
            border-radius: .55rem;
            font-weight: 600;
            transition: all .25s ease;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        /* Efek hover-scale universal */
        .hover-scale {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 14px rgba(0, 123, 255, 0.2);
        }

        /* Grid jarak antar cards */
        .row.g-4>div {
            animation: fadeInUp .6s ease both;
        }

        /* Animasi masuk */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    {{-- SweetAlert --}}
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
@endsection

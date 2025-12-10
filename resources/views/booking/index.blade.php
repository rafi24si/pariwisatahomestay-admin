@extends('layouts.admin.app')
@section('title', 'Booking Homestay')

@push('styles')
    <style>
        .fade-in {
            animation: fade .35s ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .booking-card {
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid #eef0f4;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
            transition: .25s ease;
        }

        .booking-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(0, 0, 0, .12);
            border-color: #d5d8df;
        }

        .bukti-img {
            width: 75px;
            height: 75px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e6e6e6;
            transition: .2s;
        }

        .bukti-img:hover {
            transform: scale(1.05);
        }

        .badge-status {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .btn-action {
            border-radius: 10px !important;
            font-weight: 600;
            padding: 6px 12px !important;
            transition: .2s;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid fade-in" style="padding-top:35px;">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-primary mb-0">📅 Booking Homestay</h3>
                <small class="text-muted">Kelola semua pemesanan dengan cepat dan mudah.</small>
            </div>

            <a href="{{ route('booking.create') }}" class="btn btn-primary px-4 shadow-sm" style="border-radius:12px;">
                + Booking Baru
            </a>
        </div>

        {{-- FILTER --}}
        <div class="card p-3 shadow-sm mb-4" style="border-radius:14px;">
            <form method="GET" class="row g-2 align-items-center">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" style="border-radius:12px;"
                        placeholder="🔍 Cari nama tamu, homestay, kamar..." value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select" style="border-radius:12px;">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="lunas" {{ request('status') == 'lunas' ? 'selected' : '' }}>💰 Lunas</option>
                        <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>❌ Batal</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="metode_bayar" class="form-select" style="border-radius:12px;">
                        <option value="">Semua Metode Bayar</option>
                        <option value="cash" {{ request('metode_bayar') == 'cash' ? 'selected' : '' }}>💵 Cash</option>
                        <option value="transfer" {{ request('metode_bayar') == 'transfer' ? 'selected' : '' }}>🏦 Transfer
                        </option>
                        <option value="qris" {{ request('metode_bayar') == 'qris' ? 'selected' : '' }}>📱 QRIS</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-info w-100 text-white" style="border-radius:12px;">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        {{-- LIST BOOKING --}}
        <div class="row g-3">
            @forelse($booking as $b)
                <div class="col-12">
                    <div class="booking-card p-3 d-flex align-items-center gap-3">

                        {{-- BUKTI BAYAR --}}
                        <div>
                            @if ($b->media)
                                <img src="{{ asset('storage/' . $b->media->file_url) }}" alt="bukti" class="bukti-img">
                            @else
                                <div class="bukti-img d-flex align-items-center justify-content-center bg-light text-muted"
                                    style="font-size:11px;">
                                    No Bukti
                                </div>
                            @endif
                        </div>

                        {{-- DETAIL --}}
                        <div class="flex-grow-1">

                            {{-- NAMA + STATUS --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <strong class="fs-6">{{ $b->warga->nama ?? '-' }}</strong>
                                    <div class="text-muted small">NIK: {{ $b->warga->no_ktp ?? '-' }}</div>
                                </div>

                                @php
                                    $statusIcon = [
                                        'pending' => '⏳',
                                        'lunas' => '💰',
                                        'batal' => '❌',
                                    ];
                                    $statusClass = [
                                        'pending' => 'bg-secondary text-white',
                                        'lunas' => 'bg-success text-white',
                                        'batal' => 'bg-danger text-white',
                                    ];
                                @endphp

                                <span class="badge-status {{ $statusClass[$b->status] ?? 'bg-secondary' }}">
                                    {{ $statusIcon[$b->status] ?? '' }} {{ ucfirst($b->status) }}
                                </span>
                            </div>

                            {{-- HOMESTAY --}}
                            <div class="mb-1">
                                🏠 <strong>{{ $b->kamar->homestay->nama ?? '-' }}</strong>
                                <span class="text-muted">• {{ $b->kamar->nama_kamar ?? '-' }}</span>
                            </div>

                            {{-- TANGGAL --}}
                            <div class="small text-muted">
                                📅 {{ \Carbon\Carbon::parse($b->checkin)->format('d M Y') }}
                                — {{ \Carbon\Carbon::parse($b->checkout)->format('d M Y') }}

                                @php
                                    $days = \Carbon\Carbon::parse($b->checkin)->diffInDays(
                                        \Carbon\Carbon::parse($b->checkout),
                                    );
                                @endphp

                                <span class="text-dark fw-bold">({{ $days }} malam)</span>
                            </div>

                            {{-- TOTAL --}}
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="small text-muted">
                                    💳 Metode: <strong>{{ strtoupper($b->metode_bayar) }}</strong>
                                </div>

                                <div class="fw-bold text-primary fs-6">
                                    Rp {{ number_format($b->total, 0, ',', '.') }}
                                </div>
                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="text-end">

                            {{-- TOGGLE LUNAS --}}
                            <form action="{{ route('booking.toggleLunas', $b->booking_id) }}" method="POST"
                                class="mb-2">
                                @csrf
                                @method('PATCH')

                                @if ($b->status === 'lunas')
                                    <button class="btn btn-sm btn-success btn-action w-100">
                                        ✔ Sudah Lunas
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-outline-secondary btn-action w-100">
                                        Belum Lunas
                                    </button>
                                @endif
                            </form>

                            {{-- EDIT --}}
                            <a href="{{ route('booking.edit', $b->booking_id) }}"
                                class="btn btn-sm btn-warning btn-action mb-2 w-100">
                                ✏ Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('booking.destroy', $b->booking_id) }}" method="POST"
                                onsubmit="return confirm('Hapus booking ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger btn-action w-100">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">Belum ada data booking.</h5>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $booking->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection

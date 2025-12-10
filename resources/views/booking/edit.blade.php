@extends('layouts.admin.app')
@section('title', 'Edit Booking Homestay')

@push('styles')
<style>
    .fade-in { animation: fade .4s ease-in-out; }
    @keyframes fade { from{opacity:0; transform:translateY(10px);} to{opacity:1; transform:none;} }

    .preview-img {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #eee;
        margin-right: 6px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid fade-in" style="padding-top:35px;">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h3 class="fw-bold text-blue">✏️ Edit Booking Homestay</h3>
            <p class="text-muted small mb-0">Perbarui status & metode pembayaran booking.</p>
        </div>

        <a href="{{ route('booking.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>

    <div class="card shadow-sm p-4">
        <form action="{{ route('booking.update', $booking->booking_id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- INFO BOOKING --}}
                <div class="col-md-7">
                    <h5 class="fw-bold">Informasi Pemesanan</h5>
                    <hr>

                    <p><strong>🔑 Booking ID:</strong> #{{ $booking->booking_id }}</p>
                    <p><strong>👤 Pemesan:</strong> {{ $booking->warga->nama ?? '-' }}</p>
                    <p><strong>🏠 Homestay:</strong> {{ $booking->kamar->homestay->nama ?? '-' }}</p>
                    <p><strong>🛏️ Kamar:</strong> {{ $booking->kamar->nama_kamar ?? '-' }}</p>
                    <p><strong>📅 Check-in:</strong> {{ $booking->checkin }}</p>
                    <p><strong>📅 Check-out:</strong> {{ $booking->checkout }}</p>
                    <p><strong>💰 Total:</strong> Rp {{ number_format($booking->total,0,',','.') }}</p>

                    {{-- STATUS --}}
                    <div class="mt-3">
                        <label class="form-label fw-semibold">Status Booking</label>
                        <select name="status" class="form-select" required>
                            <option value="pending"  {{ $booking->status=='pending'?'selected':'' }}>Pending</option>
                            <option value="lunas"    {{ $booking->status=='lunas'?'selected':'' }}>Lunas</option>
                            <option value="batal"    {{ $booking->status=='batal'?'selected':'' }}>Batal</option>
                        </select>
                    </div>

                    {{-- METODE BAYAR --}}
                    <div class="mt-3">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <select name="metode_bayar" class="form-select" required>
                            <option value="transfer" {{ $booking->metode_bayar=='transfer'?'selected':'' }}>Transfer</option>
                            <option value="cash"     {{ $booking->metode_bayar=='cash'?'selected':'' }}>Cash</option>
                        </select>
                    </div>
                </div>

                {{-- BUKTI BAYAR --}}
                <div class="col-md-5">
                    <h5 class="fw-bold">Bukti Pembayaran</h5>
                    <hr>

                    {{-- Tampilkan bukti lama --}}
                    @if($booking->media)
                        <p class="text-muted small">Bukti pembayaran saat ini:</p>
                        <img src="{{ asset('storage/'.$booking->media->file_url) }}"
                             class="preview-img mb-2"
                             alt="bukti pembayaran">
                    @else
                        <p class="text-muted">Belum ada bukti pembayaran.</p>
                    @endif

                    {{-- Upload bukti baru --}}
                    <div class="mt-3">
                        <label class="form-label fw-semibold">Upload Bukti Pembayaran Baru</label>
                        <input type="file" name="bukti_bayar" class="form-control" accept="image/*">
                        @error('bukti_bayar')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('booking.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>

        </form>
    </div>

</div>
@endsection

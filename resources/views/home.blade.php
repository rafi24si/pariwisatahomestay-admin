<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pariwisata & Homestay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <!-- Greeting -->
    <h1 class="display-6 mb-4">
        {{ $nama ?? 'Pengunjung' }}
    </h1>

    <!-- Destinasi Wisata -->
    <h2 class="mb-3">Destinasi Wisata</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Nama</th><th>Deskripsi</th><th>Alamat</th>
                    <th>RT</th><th>RW</th><th>Jam Buka</th><th>Tiket</th><th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinasi_wisata ?? [] as $d)
                    <tr>
                        <td>{{ $d['destinasi_id'] }}</td>
                        <td>{{ $d['nama'] }}</td>
                        <td>{{ $d['deskripsi'] }}</td>
                        <td>{{ $d['alamat'] }}</td>
                        <td>{{ $d['rt'] }}</td>
                        <td>{{ $d['rw'] }}</td>
                        <td>{{ $d['jam_buka'] }}</td>
                        <td>{{ 'Rp ' . number_format($d['tiket'] ?? 0,0,',','.') }}</td>
                        <td>{{ $d['kontak'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Data destinasi wisata kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Homestay -->
    <h2 class="mb-3">Homestay</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Nama</th><th>Alamat</th><th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($homestay ?? [] as $h)
                    <tr>
                        <td>{{ $h['homestay_id'] }}</td>
                        <td>{{ $h['nama'] }}</td>
                        <td>{{ $h['alamat'] }}</td>
                        <td>{{ $h['kontak'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada homestay</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Kamar Homestay -->
    <h2 class="mb-3">Kamar Homestay</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Homestay ID</th><th>Nama Kamar</th><th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kamar_homestay ?? [] as $k)
                    <tr>
                        <td>{{ $k['kamar_id'] }}</td>
                        <td>{{ $k['homestay_id'] }}</td>
                        <td>{{ $k['nama_kamar'] }}</td>
                        <td>Rp {{ number_format($k['harga'] ?? 0,0,',','.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada kamar homestay</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Booking Homestay -->
    <h2 class="mb-3">Booking Homestay</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Kamar ID</th><th>Warga ID</th>
                    <th>Check-in</th><th>Check-out</th><th>Total</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($booking_homestay ?? [] as $b)
                    <tr>
                        <td>{{ $b['booking_id'] }}</td>
                        <td>{{ $b['kamar_id'] }}</td>
                        <td>{{ $b['warga_id'] }}</td>
                        <td>{{ $b['checkin'] }}</td>
                        <td>{{ $b['checkout'] }}</td>
                        <td>Rp {{ number_format($b['total'] ?? 0,0,',','.') }}</td>
                        <td>{{ $b['status'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Ulasan Wisata -->
    <h2 class="mb-3">Ulasan Wisata</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Destinasi ID</th><th>Warga ID</th>
                    <th>Tanggal</th><th>Rating</th><th>Komentar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ulasan_wisata ?? [] as $u)
                    <tr>
                        <td>{{ $u['ulasan_id'] }}</td>
                        <td>{{ $u['destinasi_id'] }}</td>
                        <td>{{ $u['warga_id'] }}</td>
                        <td>{{ $u['tanggal'] }}</td>
                        <td>{{ $u['rating'] }}</td>
                        <td>{{ $u['komentar'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada ulasan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

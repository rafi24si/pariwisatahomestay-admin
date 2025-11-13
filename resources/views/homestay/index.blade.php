<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Homestay</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background: #f8fafc;
    }

    .card-warga {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(13, 60, 97, 0.1);
        overflow: hidden;
    }

    .card-header-blue {
        background: linear-gradient(90deg, #0099ff, #66ccff);
        color: #fff;
        border-bottom: 0;
        padding: 20px 24px;
    }

    .card-header-blue h4 {
        font-weight: 600;
        margin-bottom: 2px;
    }

    .btn-add {
        background: #ffffff;
        color: #0d6efd;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s;
    }

    .btn-add:hover {
        background: #e9f2ff;
        transform: scale(1.03);
    }

    .table-custom thead th {
        background: rgba(13,110,253,0.08);
        color: #084298;
        font-weight: 600;
        border-top: none;
    }

    .table-hover tbody tr:hover {
        background: rgba(13,110,253,0.05);
    }

    .badge-gender {
        background: rgba(13,110,253,0.15);
        color: #0d6efd;
        font-weight: 600;
    }

    .empty-state {
        color: #6c757d;
    }

    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .page-link {
        color: #0d6efd;
    }

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
</head>
<body>

<div class="container py-5">
    <div class="card card-warga gradient-card">
        <div class="card-header-blue d-flex justify-content-between align-items-center">
            <h4>Data Homestay</h4>
            <a href="/homestay/create" class="btn btn-add btn-glow">+ Tambah Homestay</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($homestays->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-custom align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Harga per Malam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($homestays as $h)
                                <tr>
                                    <td class="text-center">{{ $h->homestay_id }}</td>
                                    <td>{{ $h->nama }}</td>
                                    <td>{{ $h->alamat }}</td>
                                    <td>Rp{{ number_format($h->harga_per_malam, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-primary">{{ ucfirst($h->status) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/homestay/{{ $h->homestay_id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="/homestay/{{ $h->homestay_id }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center empty-state py-5">
                    <h5>Belum ada data homestay 😅</h5>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>

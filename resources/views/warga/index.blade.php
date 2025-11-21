@extends('layouts.app')

@section('content')
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
            background: rgba(13, 110, 253, 0.08);
            color: #084298;
            font-weight: 600;
            border-top: none;
        }

        .table-hover tbody tr:hover {
            background: rgba(13, 110, 253, 0.05);
        }

        .badge-gender {
            background: rgba(13, 110, 253, 0.15);
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
            0% {
                background-position: left top;
            }

            100% {
                background-position: right bottom;
            }
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

        .custom-pagination .page-link {
            border-radius: 50px !important;
            padding: 6px 14px;
            font-size: 0.85rem;
            transition: all 0.2s ease-in-out;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.4);
        }

        .custom-pagination .page-link:hover {
            background-color: #e9f2ff;
            color: #0d6efd;
            border-color: #d2e6ff;
        }

        .custom-pagination {
            box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
            padding: 10px 22px;
            border-radius: 20px;
            background: #fff;
            display: inline-block;
        }


        /* Pagination container */
        .pagination {
            margin: 0;
        }

        /* Gaya pagination biar lebih modern */
        .pagination li a,
        .pagination li span {
            border-radius: 8px !important;
            padding: 6px 12px !important;
        }

        /* Hover */
        .pagination li a:hover {
            background-color: #0d6efd;
            color: white;
        }

        /* Active page */
        .pagination .active span {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: white !important;
        }

        /* Disable state */
        .pagination .disabled span {
            color: #b5b5b5 !important;
        }

        /* Supaya lebih rapat dan kiri */
        .pagination-wrap {
            display: flex;
            justify-content: flex-start;
            width: 100%;
        }
    </style>


    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeInUp gradient-card">
            <div
                class="card-header bg-sky text-white d-flex justify-content-between align-items-center rounded-top-4 p-3 animate__animated animate__fadeInDown">
                <h4 class="mb-0 fw-bold"><i class="bi bi-map-fill me-2"></i>Data Warga</h4>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="btn btn-light text-dark fw-bold rounded-pill hover-zoom shadow-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>

                    <a href="{{ route('warga.create') }}"
                        class="btn btn-light text-primary fw-bold rounded-pill hover-zoom shadow-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Data Warga
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-3 g-2 align-items-center">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('warga.index') }}" class="d-flex">
                            <input type="text" name="q" value="{{ request('q') }}"
                                class="form-control form-control-sm" placeholder="Cari nama, no KTP, pekerjaan...">
                            <button class="btn btn-primary btn-sm ms-2" type="submit">
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </form>

                        {{-- Pagination — letak kiri --}}
                        <div class="mt-2">
                            <div class="mt-3 d-flex justify-content-start">
                                {{ $data->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body bg-light animate__animated animate__fadeIn">
                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-hover align-middle text-center shadow-sm rounded-3 overflow-hidden">
                        <thead class="table-primary text-white bg-sky">
                            <tr>
                                <th style="width:60px">No</th>
                                <th>No KTP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th class="text-center" style="width:150px">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->no_ktp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <span class="badge badge-gender rounded-pill px-3">
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->pekerjaan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('warga.edit', $item->warga_id) }}"
                                            class="btn btn-outline-primary btn-sm me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                            class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center empty-state py-4">
                                        Belum ada data warga.
                                        <a href="{{ route('warga.create') }}">Tambah warga baru</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 1800
                    });
                </script>
            @endif

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".btn-delete").forEach(button => {
                        button.addEventListener("click", function(e) {
                            const form = this.closest("form");
                            Swal.fire({
                                title: "Hapus data ini?",
                                text: "Data yang dihapus tidak dapat dikembalikan!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#d33",
                                cancelButtonColor: "#3085d6",
                                confirmButtonText: "Ya, hapus!",
                                cancelButtonText: "Batal"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    });
                });
            </script>
        @endsection

@extends('layouts.admin.app')
@section('title', 'Edit User')

@push('styles')
    <style>
        .fade-in {
            animation: fadeIn .5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid fade-in">

        <h3 class="fw-bold text-blue mb-3">✏ Edit User</h3>

        <div class="card p-4 shadow-sm" style="border-radius: 14px;">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="fw-semibold">Nama</label>
                <input type="text" name="name" class="form-control mb-3" value="{{ $user->name }}" required>

                <label class="fw-semibold">Email</label>
                <input type="email" name="email" class="form-control mb-3" value="{{ $user->email }}" required>

                <label class="fw-semibold">Password (kosongkan jika tidak diganti)</label>
                <input type="password" name="password" class="form-control mb-3">

                <label class="fw-semibold">Role</label>
                <select name="role" class="form-control mb-3">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>

                <button class="btn btn-success px-4">Update</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary px-4">Kembali</a>
            </form>

            <script>
                document.querySelector('input[name="email"]').addEventListener('input', function() {
                    let email = this.value;

                    fetch("{{ route('user.checkEmail') }}?email=" + email)
                        .then(res => res.json())
                        .then(data => {
                            let msg = document.getElementById("email-status");

                            if (data.exists) {
                                msg.innerHTML = "<span class='text-danger'>Email sudah dipakai!</span>";
                            } else {
                                msg.innerHTML = "<span class='text-success'>Email tersedia ✓</span>";
                            }
                        });
                });
            </script>

        </div>

    </div>
@endsection

    @extends('layouts.app')

    @section('content')
    <div class="container mt-4">
        <h3 class="fw-bold mb-3">Tambah Homestay</h3>

        <div class="card shadow-sm p-4 rounded-4">
            <form action="{{ route('homestay.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- PEMILIK --}}
                    <div class="mb-3">
                        <label class="form-label">Pemilik Warga</label>
                        <select name="pemilik_warga_id" class="form-select" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- NAMA --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Nama Homestay</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    {{-- RT / RW --}}
                    <div class="col-md-3 mb-3">
                        <label class="fw-semibold">RT</label>
                        <input type="text" name="rt" class="form-control" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="fw-semibold">RW</label>
                        <input type="text" name="rw" class="form-control" required>
                    </div>

                    {{-- FASILITAS JSON --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Fasilitas</label><br>

                        <label><input type="checkbox" name="fasilitas[]" value="AC"> AC</label><br>
                        <label><input type="checkbox" name="fasilitas[]" value="WiFi"> WiFi</label><br>
                        <label><input type="checkbox" name="fasilitas[]" value="Parkir"> Parkir</label><br>
                        <label><input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"> Kamar Mandi Dalam</label><br>
                    </div>

                    {{-- HARGA --}}
                    <div class="col-md-3 mb-3">
                        <label class="fw-semibold">Harga / Malam</label>
                        <input type="number" name="harga_per_malam" class="form-control" required>
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-3 mb-3">
                        <label class="fw-semibold">Status</label>
                        <select name="status" class="form-control">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    {{-- FOTO --}}
                    <div class="col-md-12 mb-3">
                        <label class="fw-semibold">Foto Homestay</label>
                        <input type="file" name="foto[]" multiple class="form-control" id="fotoInput">
                    </div>

                    {{-- PREVIEW --}}
                    <div class="col-md-12 mb-4" id="preview"></div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- PREVIEW FOTO --}}
    <script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        let preview = document.getElementById('preview');
        preview.innerHTML = "";

        Array.from(e.target.files).forEach(file => {
            let img = document.createElement('img');
            img.classList.add('m-2');
            img.style.width = "150px";
            img.style.height = "150px";
            img.style.objectFit = "cover";
            img.src = URL.createObjectURL(file);
            preview.appendChild(img);
        });
    });
    </script>
    @endsection

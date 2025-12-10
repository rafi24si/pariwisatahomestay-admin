@extends('layouts.admin.app')
@section('title', 'Dashboard')

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .fade-in { animation: fadeIn .6s ease-out; }

    /* Tema Bina Desa */
    .brand-red { color: #C62828 !important; }
    .brand-red-bg { background: #C62828 !important; }
    .brand-red-soft { background: #FDECEC !important; }

    /* Styling Card */
    .card-soft {
        border-radius: 16px;
        background: #fff;
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 18px rgba(0,0,0,0.07);
        transition: .25s ease-in-out;
    }

    .card-soft:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .stat-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        font-size: 26px;
        color: #fff;
    }

    .empty {
        color: #8d99ae;
        font-style: italic;
    }
</style>
@endpush



@section('content')
<div class="container-fluid py-4 fade-in">

    {{-- HEADER --}}
    <div class="d-flex align-items-center mb-4">
        <img src="{{ asset('assets/images/logo.png') }}" style="width:200px; margin-right:20px;" />

        <div>
            <h3 class="fw-bold brand-red mb-0">Dashboard Bina Desa</h3>
            <p class="text-muted mb-0">Sistem Informasi Pariwisata & Homestay</p>
        </div>

        {{-- JAM REALTIME --}}
        <div class="ms-auto text-end">
            <h4 class="fw-bold brand-red mb-0" id="clock" style="font-size:28px;"></h4>
            <span class="text-muted" id="date-today"></span>
        </div>
    </div>



    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card card-soft">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon brand-red-bg me-3">
                        <i class="fa fa-hotel"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold brand-red mb-0">Total Homestay</h6>
                        <span class="text-muted">12</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-soft">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon bg-primary me-3">
                        <i class="fa fa-map-location-dot"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-primary mb-0">Destinasi</h6>
                        <span class="text-muted">24</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-soft">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon bg-warning me-3">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-warning mb-0">Event</h6>
                        <span class="text-muted">3</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-soft">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon bg-success me-3">
                        <i class="fa fa-star"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-success mb-0">Ulasan</h6>
                        <span class="text-muted">58</span>
                    </div>
                </div>
            </div>
        </div>

    </div>



    {{-- CHART ROW --}}
    <div class="row g-4 mb-4">

        {{-- CHART KUNJUNGAN --}}
        <div class="col-lg-6">
            <div class="card card-soft p-3">
                <h6 class="fw-bold brand-red">Kunjungan Wisata (Mingguan)</h6>
                <canvas id="chartVisits" height="140"></canvas>
            </div>
        </div>

        {{-- CHART HUNIAN --}}
        <div class="col-lg-6">
            <div class="card card-soft p-3">
                <h6 class="fw-bold text-primary">Tingkat Hunian Homestay (%)</h6>
                <canvas id="chartHomestay" height="140"></canvas>
            </div>
        </div>

    </div>



    {{-- LIST SECTION --}}
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card card-soft">
                <div class="card-header fw-bold brand-red">
                    Homestay Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Homestay Merah Putih - 2 kamar</li>
                        <li class="list-group-item">Homestay Anggrek - 4 kamar</li>
                        <li class="list-group-item">Homestay Bambu Runcing - 3 kamar</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card card-soft">
                <div class="card-header fw-bold text-primary">
                    Event Wisata Mendatang
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Festival Kuliner Desa - 12 Februari</li>
                        <li class="list-group-item">Gerak Jalan Sehat - 20 Februari</li>
                        <li class="list-group-item">Lomba Foto Wisata - 5 Maret</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // JAM REALTIME
    function updateClock() {
        const now = new Date();
        document.getElementById("clock").innerHTML =
            now.toLocaleTimeString('id-ID', { hour12: false });

        document.getElementById("date-today").innerHTML =
            now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }
    setInterval(updateClock, 1000);
    updateClock();


    // CHART 1 - LINE
    new Chart(document.getElementById("chartVisits"), {
        type: 'line',
        data: {
            labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
            datasets: [{
                data: [50, 70, 65, 90, 120, 160, 140],
                borderColor: "#C62828",
                backgroundColor: "rgba(198,40,40,0.15)",
                tension: .4,
                borderWidth: 3
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });


    // CHART 2 - BAR
    new Chart(document.getElementById("chartHomestay"), {
        type: 'bar',
        data: {
            labels: ["Homestay A", "Homestay B", "Homestay C", "Homestay D"],
            datasets: [{
                data: [80, 60, 75, 90],
                backgroundColor: ["#C62828", "#8E0000", "#C62828", "#8E0000"]
            }]
        },
        options: { responsive:true, plugins:{ legend:{ display:false } } }
    });

</script>
@endpush

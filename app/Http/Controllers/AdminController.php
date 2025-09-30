<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()

    {
        // Data dummy
        $destinasi_wisata = [
            [
                'destinasi_id' => 1,
                'nama' => 'Pantai Indah',
                'deskripsi' => 'Pantai dengan pasir putih yang indah.',
                'alamat' => 'Jl. Raya Pantai No. 1',
                'rt' => '01',
                'rw' => '02',
                'jam_buka' => '08:00 - 17:00',
                'tiket' => 20000,
                'kontak' => '08123456789'
            ],
            [
                'destinasi_id' => 2,
                'nama' => 'Gunung Asri',
                'deskripsi' => 'Pemandangan alam pegunungan.',
                'alamat' => 'Jl. Pegunungan No. 3',
                'rt' => '02',
                'rw' => '04',
                'jam_buka' => '06:00 - 15:00',
                'tiket' => 10000,
                'kontak' => '08987654321'
            ]
        ];

        $homestay = [
            [
                'homestay_id' => 1,
                'nama' => 'Homestay Sejuk',
                'alamat' => 'Jl. Melati No. 5',
                'kontak' => '08123456789'
            ],
            [
                'homestay_id' => 2,
                'nama' => 'Homestay Asri',
                'alamat' => 'Jl. Kenanga No. 7',
                'kontak' => '08234567890'
            ]
        ];

        $kamar_homestay = [
            [
                'kamar_id' => 1,
                'homestay_id' => 1,
                'nama_kamar' => 'Kamar Matahari',
                'harga' => 300000
            ],
            [
                'kamar_id' => 2,
                'homestay_id' => 2,
                'nama_kamar' => 'Kamar Pelangi',
                'harga' => 350000
            ]
        ];

        $booking_homestay = [
            [
                'booking_id' => 1,
                'kamar_id' => 1,
                'warga_id' => 1,
                'checkin' => '2025-02-01',
                'checkout' => '2025-02-02',
                'total' => 300000,
                'status' => 'Menunggu'
            ],
            [
                'booking_id' => 2,
                'kamar_id' => 2,
                'warga_id' => 2,
                'checkin' => '2025-03-01',
                'checkout' => '2025-03-02',
                'total' => 350000,
                'status' => 'Dikonfirmasi'
            ]
        ];

        $ulasan_wisata = [
            [
                'ulasan_id' => 1,
                'destinasi_id' => 1,
                'warga_id' => 1,
                'tanggal' => '2025-02-01',
                'rating' => 5,
                'komentar' => 'Bagus sekali!'
            ],
            [
                'ulasan_id' => 2,
                'destinasi_id' => 2,
                'warga_id' => 2,
                'tanggal' => '2025-03-01',
                'rating' => 4,
                'komentar' => 'Cukup menarik'
            ]
        ];

        // Kirim semua data ke view
        return view('home', [
            'nama' => $nama ?? 'Pengunjung',
            'destinasi_wisata' => $destinasi_wisata,
            'homestay' => $homestay,
            'kamar_homestay' => $kamar_homestay,
            'booking_homestay' => $booking_homestay,
            'ulasan_wisata' => $ulasan_wisata
        ]);

    return view('home', $data);
}

    public function data($nama = null)
    {
    return view('home', [
        'nama' => $nama ?? 'Pengunjung',
        'destinasi_wisata' => $destinasi_wisata ?? [],
    ]);
}

public function showData($nama = null)
{
    $destinasi_wisata = [
        ['destinasi_id'=>1,'nama'=>'Pantai Indah','deskripsi'=>'Pantai dengan pasir putih','alamat'=>'Jl. Raya Pantai No. 1','rt'=>'01','rw'=>'02','jam_buka'=>'08:00 - 17:00','tiket'=>20000,'kontak'=>'08123456789'],
        ['destinasi_id'=>2,'nama'=>'Gunung Asri','deskripsi'=>'Pemandangan pegunungan','alamat'=>'Jl. Pegunungan No. 3','rt'=>'02','rw'=>'04','jam_buka'=>'06:00 - 15:00','tiket'=>10000,'kontak'=>'08987654321'],
    ];

    $homestay = [
        ['homestay_id'=>1,'nama'=>'Homestay Sejuk','alamat'=>'Jl. Melati No. 5','kontak'=>'08123456789'],
        ['homestay_id'=>2,'nama'=>'Homestay Asri','alamat'=>'Jl. Kenanga No. 7','kontak'=>'08234567890'],
    ];

    return view('home', compact('nama', 'destinasi_wisata', 'homestay', 'kamar_homestay', 'booking_homestay', 'ulasan_wisata'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nama)
    {
    $data = [
        'nama' => $nama,
    ];
    return view('home', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

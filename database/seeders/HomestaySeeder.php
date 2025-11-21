<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homestay;
use App\Models\Warga;

class HomestaySeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua warga yang punya ID (pastikan tabel warga sudah ada datanya)
        $wargaList = Warga::pluck('warga_id')->toArray();

        if (empty($wargaList)) {
            $this->command->info('Tidak ada data warga! Isi tabel warga dulu.');
            return;
        }

        // Seeder contoh 5 homestay
        foreach (range(1, 5) as $i) {
            Homestay::create([
                'pemilik_warga_id' => $wargaList[array_rand($wargaList)],

                'nama' => 'Homestay Nyaman ' . $i,
                'alamat' => 'Jalan Kenanga No. ' . rand(10, 99),
                'rt' => rand(1, 5),
                'rw' => rand(1, 5),

                // Isi JSON fasilitas
                'fasilitas_json' => json_encode([
                    'wifi' => true,
                    'ac' => true,
                    'kasur' => 'Queen Size',
                    'toilet' => 'Dalam',
                ]),

                'harga_per_malam' => rand(150000, 500000),
                'status' => rand(0, 1) ? 'tersedia' : 'tidak tersedia',
            ]);
        }

        $this->command->info('Seeder Homestay berhasil di-generate dengan relasi!');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KamarHomestay;
use App\Models\Homestay;
use Faker\Factory as Faker;

class KamarHomestaySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $homestays = Homestay::all();

        if ($homestays->count() === 0) {
            $this->command->warn("⚠ Tidak ada homestay ditemukan. Jalankan HomestaySeeder dulu.");
            return;
        }

        $namaKamarList = [
            'Kamar Pelangi', 'Kamar Cemara', 'Kamar Kenanga', 'Kamar Melati',
            'Kamar Mawar', 'Kamar Anggrek', 'Kamar Sakura', 'Kamar Pinus',
            'Kamar Flamboyan', 'Kamar Lavender', 'Kamar Aster', 'Kamar Damar',
            'Kamar Teratai', 'Kamar Surya', 'Kamar Cendana', 'Kamar Dahlia'
        ];

        $fasilitasList = [
            ['WiFi', 'AC', 'TV', 'Kamar Mandi Dalam'],
            ['WiFi', 'Kipas Angin', 'Air Panas'],
            ['AC', 'Lemari', 'Meja Kerja'],
            ['TV', 'Kamar Mandi Luar', 'Air Panas'],
            ['WiFi', 'AC', 'Sarapan'],
            ['WiFi', 'Balkon', 'Pemandangan Laut'],
            ['AC', 'TV', 'Kolam Renang'],
            ['Kamar Mandi Dalam', 'Air Panas', 'WiFi'],
        ];

        foreach ($homestays as $homestay) {

            $jumlahKamar = rand(1, 4);

            for ($i = 1; $i <= $jumlahKamar; $i++) {
                KamarHomestay::create([
                    'homestay_id'   => $homestay->homestay_id,
                    'nama_kamar'    => $faker->randomElement($namaKamarList) . ' ' . $faker->numberBetween(1, 9),
                    'kapasitas'     => $faker->numberBetween(1, 6),
                    'fasilitas_json'=> json_encode($faker->randomElement($fasilitasList)),
                    'harga'         => $faker->numberBetween(100000, 600000),
                ]);
            }
        }
    }
}

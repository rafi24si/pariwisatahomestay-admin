<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DestinasiWisata;
use Faker\Factory as Faker;

class DestinasiWisataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DestinasiWisata::create([
                'nama' => $faker->randomElement([
                    'Pantai Indah', 'Air Terjun Pelangi', 'Danau Biru', 'Bukit Senja',
                    'Kebun Teh Asri', 'Goa Batu Rindu', 'Taman Sakura', 'Desa Wisata Alam',
                    'Gunung Sejahtera', 'Puncak Mentari', 'Pulau Bahagia', 'Curug Mawar',
                    'Hutan Pinus Lestari', 'Pantai Surya', 'Kampung Nelayan', 'Agrowisata Melati',
                    'Taman Laut Nusantara', 'Bukit Bintang', 'Lembah Hijau', 'Pantai Cemara'
                ]) . ' ' . $faker->citySuffix(),

                'deskripsi' => $faker->paragraph(3, true),
                'alamat' => $faker->address,
                'rt' => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'jam_buka' => $faker->randomElement([
                    '07.00 - 17.00',
                    '08.00 - 18.00',
                    '09.00 - 21.00',
                    '06.00 - 16.00',
                ]),
                'tiket' => $faker->randomFloat(2, 5000, 50000),
                'kontak' => '08' . $faker->numerify('##########'),

                // tambahan dua kolom baru
                'fasilitas' => $faker->randomElement([
                    'Toilet, Mushola, Parkir Luas',
                    'Gazebo, Spot Foto, Warung Makan',
                    'Area Camping, Parkir, Rest Area',
                    'Playground, Toilet Umum, Kios Oleh-oleh'
                ]),
                'warga_id' => $faker->numberBetween(1, 10), // sesuaikan dengan jumlah data warga kamu
            ]);
        }
    }
}

<?php
namespace Database\Seeders;

use App\Models\DestinasiWisata;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DestinasiWisataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            DestinasiWisata::create([
                'nama'      => $faker->randomElement([
                    'Pantai Indah', 'Air Terjun Pelangi', 'Danau Biru', 'Bukit Senja',
                    'Kebun Teh Asri', 'Goa Batu Rindu', 'Taman Sakura', 'Desa Wisata Alam',
                    'Gunung Sejahtera', 'Puncak Mentari', 'Pulau Bahagia', 'Curug Mawar',
                    'Hutan Pinus Lestari', 'Pantai Surya', 'Kampung Nelayan', 'Agrowisata Melati',
                    'Taman Laut Nusantara', 'Bukit Bintang', 'Lembah Hijau', 'Pantai Cemara',

                    // Tambahan baru ↓↓↓
                    'Pantai Pasir Emas', 'Gunung Arjuno Raya', 'Kebun Raya Nusantara',
                    'Taman Bunga Cempaka', 'Pulau Karang Jernih', 'Desa Adat Harmoni',
                    'Pantai Ombak Tenang', 'Air Terjun Mega Asri', 'Lembah Anggrek',
                    'Bukit Batu Pandang', 'Goa Kristal Putih', 'Hutan Mangrove Sejati',
                    'Taman Wisata Pelita', 'Puncak Awan Putih', 'Kampung Kopi Nusantara',
                    'Danau Zamrud', 'Pantai Batu Perak', 'Curug Gembira', 'Savana Baluran',
                    'Rawa Emerald', 'Gunung Batu Langit', 'Desa Wisata Cahaya',
                    'Pantai Seroja', 'Bukit Matahari', 'Taman Pinus Meranti',
                    'Air Terjun Kelambu', 'Kampung Pelangi', 'Pulau Mentari Cerah',
                    'Taman Tropis Nusantara', 'Desa Wisata Rembulan', 'Danau Sinar Pagi',
                    'Pantai Buih Putih', 'Goa Keabadian', 'Ladang Stroberi Asri',
                    'Taman Wisata Kamboja', 'Puncak Langit Biru', 'Desa Wisata Mawar Putih',
                    'Pantai Karang Senja', 'Air Terjun Bulan Sabit', 'Hutan Lumut Hijau',

                    // Tambahan lagi agar lebih variatif
                    'Pantai Ombak Tiga', 'Bukit Kasih Sayang', 'Gunung Daun Emas',
                    'Danau Bintang Surya', 'Hutan Cemara Laut', 'Taman Wisata Sejuta Angin',
                    'Goa Permata Nusantara', 'Pantai Cinta Damai', 'Puncak Surya Kencana',
                    'Taman Flora Lestari', 'Air Terjun Raja Wali', 'Pulau Pelangi Indah',
                    'Lembah Cendrawasih', 'Bukit Awan Senyum', 'Taman Wisata Pesisir',
                    'Pantai Batu Ombak', 'Agrowisata Kelapa Muda', 'Desa Wisata Harapan',
                ]) . ' ' . $faker->citySuffix(),

                'deskripsi' => $faker->paragraph(3, true),
                'alamat'    => $faker->address,
                'rt'        => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'rw'        => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'jam_buka'  => $faker->randomElement([
                    '07.00 - 17.00',
                    '08.00 - 18.00',
                    '09.00 - 21.00',
                    '06.00 - 16.00',
                ]),
                'tiket'     => $faker->randomFloat(2, 5000, 50000),
                'kontak'    => '08' . $faker->numerify('##########'),

                // tambahan dua kolom baru
                'fasilitas' => $faker->randomElement([
                    'Toilet, Mushola, Parkir Luas',
                    'Gazebo, Spot Foto, Warung Makan',
                    'Area Camping, Parkir, Rest Area',
                    'Playground, Toilet Umum, Kios Oleh-oleh',
                ]),
                'warga_id'  => $faker->numberBetween(1, 10), // sesuaikan dengan jumlah data warga kamu
            ]);
        }
    }
}

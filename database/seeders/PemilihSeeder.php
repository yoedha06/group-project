<?php

namespace Database\Seeders;

use App\Models\Pemilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemilih::create([
            'nama_pemilih' => 'Yuda Hidayat',
            'tanggal_lahir' => '2005-01-02',
            'alamat' => 'Jalan Contoh No.3',
            'koordinat' => '-6.915350160519287, 107.56646669690798',
            'no_ktp' => '1234567835676875',
            'status_pemilihan' => 'Belum Memilih',
        ]);

        Pemilih::create([
            'nama_pemilih' => 'dzaki ramadhan',
            'tanggal_lahir' => '2005-01-09',
            'alamat' => 'Jalan Contoh No.8',
            'koordinat' => '-6.896945245719411, 107.51081421469452',
            'no_ktp' => '1234567805676875',
            'status_pemilihan' => 'Sudah Memilih',
        ]);

        Pemilih::create([
            'nama_pemilih' => 'Ryan Ribu',
            'tanggal_lahir' => '2005-09-04',
            'alamat' => 'Jalan Contoh No.1',
            'koordinat' => '-6.8797325948982895, 107.58467399047166',
            'no_ktp' => '1234567805676879',
            'status_pemilihan' => 'Sudah Memilih',
        ]);

        Pemilih::create([
            'nama_pemilih' => 'Cepi Cristhian',
            'tanggal_lahir' => '2005-02-04',
            'alamat' => 'Jalan Contoh No.6',
            'koordinat' => '-6.8768353546589545, 107.54602643337894',
            'no_ktp' => '1234527805676878',
            'status_pemilihan' => 'Belum Memilih',

        ]);
    }
}

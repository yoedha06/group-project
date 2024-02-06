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

        Pemilih::create([
            'nama_pemilih' => 'rapi ronaldo',
            'tanggal_lahir' => '2005-02-04',
            'alamat' => 'Jalan Contoh No.6',
            'koordinat' => '-6.902739462784161, 107.6450518761327',
            'no_ktp' => '1234527804876878',
            'status_pemilihan' => 'Belum Memilih',

        ]);

        Pemilih::create([
            'nama_pemilih' => 'gita',
            'tanggal_lahir' => '2005-02-04',
            'alamat' => 'Jalan Contoh No.6',
            'koordinat' => '-6.94636422702139, 107.62206301824433',
            'no_ktp' => '1234527005676878',
            'status_pemilihan' => 'Belum Memilih',

        ]);

        Pemilih::create([
            'nama_pemilih' => 'starboy',
            'tanggal_lahir' => '2005-02-04',
            'alamat' => 'Jalan Contoh No.6',
            'koordinat' => '-6.890128429021905, 107.60971079609537',
            'no_ktp' => '1234527885676878',
            'status_pemilihan' => 'Belum Memilih',

        ]);

        Pemilih::create([
            'nama_pemilih' => 'arya mullet',
            'tanggal_lahir' => '2005-02-04',
            'alamat' => 'Jalan Contoh No.6',
            'koordinat' => '-6.888765053918652, 107.56647801857399',
            'no_ktp' => '1234527805672878',
            'status_pemilihan' => 'Belum Memilih',

        ]);
    }
}

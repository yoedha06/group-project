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
            'no_ktp' => '1234567835676875',
            'status_pemilihan' => 'Belum Memilih',
        ]);

        Pemilih::create([
            'nama_pemilih' => 'Zaki ',
            'tanggal_lahir' => '2005-06-11',
            'alamat' => 'Jalan Lain No. 456',
            'no_ktp' => '9876543212567658',
            'status_pemilihan' => 'Sudah Memilih',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PartaiPolitik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParpolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartaiPolitik::create([
            'NamaPartai' => 'Partai Pilihan Indonesia',
            'Ideologi' => 'Demokrat',
            'JumlahAnggota' => 5,
            'PemimpinPartai' => 'Yuda Hidayat',
        ]);

        PartaiPolitik::create([
            'NamaPartai' => 'Partai NasDem',
            'Ideologi' => 'NasDem',
            'JumlahAnggota' => 10,
            'PemimpinPartai' => 'Zaki ',
        ]);

        PartaiPolitik::create([
            'NamaPartai' => 'Partai PDI Perjuangan',
            'Ideologi' => 'PDI',
            'JumlahAnggota' => 10,
            'PemimpinPartai' => 'Asep saipuloh',
        ]);

        PartaiPolitik::create([
            'NamaPartai' => 'Partai Keadilan Sejahtera',
            'Ideologi' => 'Keadilan',
            'JumlahAnggota' => 8,
            'PemimpinPartai' => 'Chepi',
        ]);

        PartaiPolitik::create([
            'NamaPartai' => 'Partai Gerakan Indonesia Raya',
            'Ideologi' => 'Gerakan Indonesia Raya',
            'JumlahAnggota' => 9,
            'PemimpinPartai' => 'Ryan Rb',
        ]);
    }
}

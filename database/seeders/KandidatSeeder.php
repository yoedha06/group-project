<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kandidat')->insert([
            [
                'Nama_Kandidat' => 'Ganjar Pranowo - H.Madhfud MD',
                'Tanggal_Lahir' => '2024-01-01',
                'Partai_Politik' => 'PDI',
                'Nomor_Urut' => 1,
                'Program_Kerja' => 'Membuka 20 Lapangan Kerja',
            ],
            [
                'Nama_Kandidat' => 'Prabowo Subianto - Gibran Rakabuming Raka',
                'Tanggal_Lahir' => '2024-01-02',
                'Partai_Politik' => 'Gerinda',
                'Nomor_Urut' => 2,
                'Program_Kerja' => 'Memperkuat Pertahanan Negara',
            ],
            [
                'Nama_Kandidat' => 'Anies Baswedan - H. A. Muhaimin Iskandar',
                'Tanggal_Lahir' => '2024-01-03',
                'Partai_Politik' => 'Unaffiliated',
                'Nomor_Urut' => 3,
                'Program_Kerja' => 'Gratis BBM',
            ],
        ]);
    }
}

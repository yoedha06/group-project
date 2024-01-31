<?php

namespace Database\Seeders;

use App\Models\history;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        history::create([
            'latlng' => '-6.987654321, 107.987654321',
            'bounds' => '-6.987654321, 107.987654321',
            'accuracy' => '100',
            'altitude' => '100',
            'altitude_acuracy' => '100',
            'heading' => '100',
            'speeds' => '100',
        ]);
    }
}

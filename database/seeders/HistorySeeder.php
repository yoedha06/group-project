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
            'latlng' => '-6.9169690770754775, 107.57359877089785',
            'bounds' => '1',
            'accuracy' => '10',
            'altitude' => '100',
            'altitude_acuracy' => '100',
            'heading' => '100',
            'speeds' => '10',
        ]);
        history::create([
            'latlng' => '-6.917821136191987, 107.5783223612092',
            'bounds' => '2',
            'accuracy' => '10',
            'altitude' => '200',
            'altitude_acuracy' => '200',
            'heading' => '200',
            'speeds' => '10',
        ]);
        history::create([
            'latlng' => '-6.9182471651737405, 107.58321771844093',
            'bounds' => '3',
            'accuracy' => '10',
            'altitude' => '300',
            'altitude_acuracy' => '400',
            'heading' => '400',
            'speeds' => '10',
        ]);
        history::create([
            'latlng' => '-6.91901401637227, 107.58819895913284',
            'bounds' => '4',
            'accuracy' => '10',
            'altitude' => '400',
            'altitude_acuracy' => '400',
            'heading' => '400',
            'speeds' => '30',
        ]);
        history::create([
            'latlng' => '-6.919440044277738, 107.59214959830234',
            'bounds' => '5',
            'accuracy' => '10',
            'altitude' => '500',
            'altitude_acuracy' => '500',
            'heading' => '500',
            'speeds' => '40',
        ]);
        history::create([
            'latlng' => '-6.919951277256839, 107.5967873051535',
            'bounds' => '6',
            'accuracy' => '10',
            'altitude' => '600',
            'altitude_acuracy' => '600',
            'heading' => '600',
            'speeds' => '50',
        ]);
        history::create([
            'latlng' => '-6.920547715032739, 107.60116736162398',
            'bounds' => '7',
            'accuracy' => '10',
            'altitude' => '700',
            'altitude_acuracy' => '700',
            'heading' => '700',
            'speeds' => '60',
        ]);
        history::create([
            'latlng' => '-6.921144152055039, 107.60606271885572',
            'bounds' => '8',
            'accuracy' => '10',
            'altitude' => '800',
            'altitude_acuracy' => '800',
            'heading' => '800',
            'speeds' => '70',
        ]);
        history::create([
            'latlng' => '-6.921570178038114, 107.60949805726393',
            'bounds' => '9',
            'accuracy' => '10',
            'altitude' => '900',
            'altitude_acuracy' => '900',
            'heading' => '900',
            'speeds' => '80',
        ]);
        history::create([
            'latlng' => '-6.922081408710194, 107.61404988065485',
            'bounds' => '60',
            'accuracy' => '10',
            'altitude' => '10',
            'altitude_acuracy' => '10',
            'heading' => '10',
            'speeds' => '100',
        ]);
        
    }
}

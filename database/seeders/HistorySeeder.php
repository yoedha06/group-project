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
            'latlng' => '-6.893045274912564, 107.55847254062101',
            'bounds' => '0',
            'accuracy' => '100',
            'altitude' => '100',
            'altitude_acuracy' => '100',
            'heading' => '100',
            'speeds' => '100',
        ]);
        history::create([
            'latlng' => '-6.893429832456373, 107.55874473780585',
            'bounds' => '0',
            'accuracy' => '200',
            'altitude' => '200',
            'altitude_acuracy' => '200',
            'heading' => '200',
            'speeds' => '200',
        ]);
        history::create([
            'latlng' => '-6.894334061127173, 107.55923678656306',
            'bounds' => '0',
            'accuracy' => '300',
            'altitude' => '300',
            'altitude_acuracy' => '400',
            'heading' => '400',
            'speeds' => '400',
        ]);
        history::create([
            'latlng' => '-6.901753537953714, 107.56379390059374',
            'bounds' => '0',
            'accuracy' => '400',
            'altitude' => '400',
            'altitude_acuracy' => '400',
            'heading' => '400',
            'speeds' => '400',
        ]);
        history::create([
            'latlng' => '-6.8949888463776805, 107.55966602067768',
            'bounds' => '0',
            'accuracy' => '500',
            'altitude' => '500',
            'altitude_acuracy' => '500',
            'heading' => '500',
            'speeds' => '500',
        ]);
        history::create([
            'latlng' => '-6.895695597643467, 107.56010572382242',
            'bounds' => '0',
            'accuracy' => '600',
            'altitude' => '600',
            'altitude_acuracy' => '600',
            'heading' => '600',
            'speeds' => '600',
        ]);
        history::create([
            'latlng' => '-6.897202637262586, 107.56099559923439',
            'bounds' => '0',
            'accuracy' => '700',
            'altitude' => '700',
            'altitude_acuracy' => '700',
            'heading' => '700',
            'speeds' => '700',
        ]);
        history::create([
            'latlng' => '-6.898283545520694, 107.56167609225086',
            'bounds' => '0',
            'accuracy' => '800',
            'altitude' => '800',
            'altitude_acuracy' => '800',
            'heading' => '800',
            'speeds' => '800',
        ]);
        history::create([
            'latlng' => '-6.900455747878283, 107.56299520176104',
            'bounds' => '0',
            'accuracy' => '900',
            'altitude' => '900',
            'altitude_acuracy' => '900',
            'heading' => '900',
            'speeds' => '900',
        ]);
        history::create([
            'latlng' => '-6.903507332536384, 107.56485386015989',
            'bounds' => '0',
            'accuracy' => '1000',
            'altitude' => '1000',
            'altitude_acuracy' => '1000',
            'heading' => '1000',
            'speeds' => '1000',
        ]);
        
    }
}

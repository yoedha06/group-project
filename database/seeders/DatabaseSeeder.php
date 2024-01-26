<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'ryan',
            'email' => 'ryanrb@example.com',
            'password' => '12345678',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'ryanuser',
            'email' => 'ryanuser@example.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        $this->call([
            KandidatSeeder::class,
            PemilihSeeder::class,
            ParpolSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            FuncaoSeeder::class,
            UserSeeder::class,
            FestaSeeder::class,
            ConvidadoSeeder::class,
            StatusConvidadoSeeder::class,
            DjSeeder::class,
        ]);
    }
}

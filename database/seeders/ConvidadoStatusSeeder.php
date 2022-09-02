<?php

namespace Database\Seeders;

use App\Models\ConvidadoStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConvidadoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConvidadoStatus::create(['nome' => 'Convidado']);
        ConvidadoStatus::create(['nome' => 'Confirmado']);
        ConvidadoStatus::create(['nome' => 'Recusado']);
    }
}

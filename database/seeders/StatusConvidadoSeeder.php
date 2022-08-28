<?php

namespace Database\Seeders;

use App\Models\StatusConvidado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusConvidadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusConvidado::create(['nome' => 'A ser convidado']);
        StatusConvidado::create(['nome' => 'Convidado']);
        StatusConvidado::create(['nome' => 'Confirmado']);
        StatusConvidado::create(['nome' => 'Não vai']);
    }
}

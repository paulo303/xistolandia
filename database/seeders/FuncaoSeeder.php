<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcao::firstOrCreate([
            'nome'      => 'Admin',
            'descricao' => 'Admin master do sistema',
        ]);

        Funcao::firstOrCreate([
            'nome'      => 'Gerenciador',
            'descricao' => 'Gerencia a maioria das funções do sistema',
        ]);

        Funcao::firstOrCreate([
            'nome'      => 'Usuário',
            'descricao' => 'Usuário com poucas funções no sistema',
        ]);
    }
}

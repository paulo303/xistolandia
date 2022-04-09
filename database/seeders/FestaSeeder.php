<?php

namespace Database\Seeders;

use App\Models\Festa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = '2022-04-21';

        Festa::create([
            'data'      => $date,
            'atracoes'   => 'Geezer e Isa Alkaline',
            'flyer'     => "images/flyers/{$date}.jpeg",
        ]);
    }
}

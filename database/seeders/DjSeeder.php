<?php

namespace Database\Seeders;

use App\Models\Dj;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dj::create(['nome' => 'Acid Chochi']);
        Dj::create(['nome' => 'Tiago Santos']);
        Dj::create(['nome' => 'Coruja']);
        Dj::create(['nome' => 'Rafinha']);
        Dj::create(['nome' => 'Xisto']);
        Dj::create(['nome' => 'Mou']);
        Dj::create(['nome' => 'Ricardinho']);
        Dj::create(['nome' => 'Fab']);
        Dj::create(['nome' => 'Jah Scoop']);
        Dj::create(['nome' => 'Isa Alkaline']);
        Dj::create(['nome' => 'Popis']);
        Dj::create(['nome' => 'The Geezer']);
        Dj::create(['nome' => 'Calabra']);
    }
}

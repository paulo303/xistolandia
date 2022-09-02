<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Chochi',
            'email'     => 'paulocavalcanti303@gmail.com',
            'password'  => bcrypt('123456'),
            'funcao_id' => 1,
        ]);
    }
}

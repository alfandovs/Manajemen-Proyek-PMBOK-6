<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Project Manager',
            'email' => 'pm@intive.com',
            'password' => bcrypt('pm123'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Eksekutif',
            'email' => 'eks@intive.com',
            'password' => bcrypt('eks123'),
            'remember_token' => Str::random(60),
        ]);
    }
}

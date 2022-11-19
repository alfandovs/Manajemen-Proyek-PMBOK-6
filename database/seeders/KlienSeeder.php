<?php

namespace Database\Seeders;
use App\Models\client;


use Illuminate\Database\Seeder;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        client::create([
            'name' => 'Muhammad Eastoni',
            'addres' => 'Karyawan',
            'phone' => 'Programmer',
        ]);
    }
}

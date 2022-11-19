<?php

namespace Database\Seeders;
use illuminate\Support\Str;
use App\Models\employe;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        employe::create([
            'name' => 'Muhammad Eastoni',
            'position' => 'Karyawan',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Zulfikri Julian',
            'position' => 'Karyawan',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Muhammad Eastoni',
            'position' => 'Karyawan',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Bima Anggara',
            'position' => 'Karyawan',
            'skill' => 'Sistem Analis',
        ]);

        employe::create([
            'name' => 'Muhammad Bayu',
            'position' => 'CEO',
            'skill' => 'CEO',
        ]);

        employe::create([
            'name' => 'Galuh Nugroho',
            'position' => 'Karyawan',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Galuh Kumala',
            'position' => 'Karyawan',
            'skill' => 'Design',
        ]);

        employe::create([
            'name' => 'Esa Dandy',
            'position' => 'Freelance',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Angga Yudika',
            'position' => 'Freelance',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Dimas Kurniawan',
            'position' => 'Freelance',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Aditya Rezky',
            'position' => 'Project Manager',
            'skill' => 'Project Manager',
        ]);

        employe::create([
            'name' => 'Andhika Yuda',
            'position' => 'Karyawan',
            'skill' => 'Programmer',
        ]);

        employe::create([
            'name' => 'Rendi Aditya',
            'position' => 'Karyawan',
            'skill' => 'Akuntan',
        ]);
    }
}

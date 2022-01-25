<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama'  => 'Aldy Hysam Aliandi',
            'jk'  => 'cowo',
            'no'  => '089662100171',
            'email'  => 'aldyaliandi@gmail.com',
            'salary'  => '100000',
            'foto'  => 'Al',
        ]);
    }
}

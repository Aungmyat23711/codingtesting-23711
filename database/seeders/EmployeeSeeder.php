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
            'name' => "Mya Mya",
            'email' => "myamya@gmail.com",
            'phone' => '0923434345',
            'address' => 'Yangon',
            'dob' => '12-11-2002',
            'position_id' => '2'
        ]);
    }
}

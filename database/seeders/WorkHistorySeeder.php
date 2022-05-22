<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('work_histories')->insert([
            'position' => "Manager",
            'company' => "MTFK",
            'start_date' => '12-11-2000',
            'end_date' => '13-10-2001',
            'employee_id' => '4'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_departments')->insert([
            'name' => 'General Support',
            'description' => 'General Support, includes account activation, password recovary etc.'
        ]);
        DB::table('support_departments')->insert([
            'name' => 'Account and Billing',
            'description' => 'Account and Billing Support, includes payment, diposit, invoice etc.'
        ]);
        DB::table('support_departments')->insert([
            'name' => 'Technical Support',
            'description' => 'Technical Support, includes installation of service, update server, change ip address etc.'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'EURCAD',
            'icon' => 'eu-ca'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GBPNZD',
            'icon' => 'gb-nz'
        ]);
        DB::table('currencies')->insert([
            'name' => 'EURGBP',
            'icon' => 'eu-gb'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GBPUSD',
            'icon' => 'gb-us'
        ]);
        DB::table('currencies')->insert([
            'name' => 'EURJPY',
            'icon' => 'eu-jp'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GBPJPY',
            'icon' => 'gb-jp'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GPBUSD',
            'icon' => 'gb-us'
        ]);
        DB::table('currencies')->insert([
            'name' => 'NZDUSD',
            'icon' => 'gb-nz'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GBPCAD',
            'icon' => 'gb-ca'
        ]);
        DB::table('currencies')->insert([
            'name' => 'USDCAD',
            'icon' => 'us-ca'
        ]);
        DB::table('currencies')->insert([
            'name' => 'USDCHF',
            'icon' => 'us-ch'
        ]);
        DB::table('currencies')->insert([
            'name' => 'AUDUSD',
            'icon' => 'au-us'
        ]);
        DB::table('currencies')->insert([
            'name' => 'GBPCHF',
            'icon' => 'gb-ch'
        ]);
        DB::table('currencies')->insert([
            'name' => 'USDJPY',
            'icon' => 'us-jp'
        ]);
        DB::table('currencies')->insert([
            'name' => 'EURUSD',
            'icon' => 'eu-us'
        ]);
    }
}

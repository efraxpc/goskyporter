<?php

use Illuminate\Database\Seeder;

class QueryStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('query_statuses')->insert([
            'name' => 'Hold',
        ]);

        DB::table('query_statuses')->insert([
            'name' => 'Sold',
        ]);

        DB::table('query_statuses')->insert([
            'name' => 'Lost',
        ]);
    }
}

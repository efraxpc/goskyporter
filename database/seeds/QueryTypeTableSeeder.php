<?php

use Illuminate\Database\Seeder;

class QueryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('query_types')->insert([
            'name' => 'USA to India',
        ]);

        DB::table('query_types')->insert([
            'name' => 'India to Pakistan',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'name' => 'Settle Tacoma, Washinton USA',
            'data' => 'STW'
        ]);
        DB::table('airports')->insert([
            'name' => 'Washinton All airports, District of Columbia',
            'data' => 'WADC'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AirlineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airlines')->insert([
            'name' => 'American Airlines',
        ]);

        DB::table('airlines')->insert([
            'name' => 'Luftansa',
        ]);
    }
}

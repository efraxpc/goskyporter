<?php

use Illuminate\Database\Seeder;

class BookingSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_sources')->insert([
            'name' => 'Facebook App',
        ]);
        DB::table('booking_sources')->insert([
            'name' => 'Google',
        ]);
    }
}

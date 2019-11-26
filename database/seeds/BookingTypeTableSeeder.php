<?php

use Illuminate\Database\Seeder;

class BookingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_types')->insert([
            'name' => 'One way',
            'slug' => 'one-way',
        ]);
        DB::table('booking_types')->insert([
            'name' => 'Round Trip',
            'slug' => 'round-trip',
        ]);
        DB::table('booking_types')->insert([
            'name' => 'Multicity',
            'slug' => 'multicity',
        ]);
    }
}

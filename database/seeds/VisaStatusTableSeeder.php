<?php

use Illuminate\Database\Seeder;

class VisaStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visa_statuses')->insert([
            'status' => 'US National',
        ]);

        DB::table('visa_statuses')->insert([
            'status' => 'Green card',
        ]);

        DB::table('visa_statuses')->insert([
            'status' => 'Expired Visa',
        ]);

        DB::table('visa_statuses')->insert([
            'status' => 'Valid & Stamped Visitor Visa',
        ]);
    }
}

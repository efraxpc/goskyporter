<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'Efrain',
            'last_name' => 'Colmenares',
            'us_phone_number' => '+1 (305) 297-4782',
            'us_alternate_number' => '+1 (305) 297-4780',
            'indian_number' => '07582-221434',
            'email' => 'efraxpc@gmail.com',
        ]);
    }
}

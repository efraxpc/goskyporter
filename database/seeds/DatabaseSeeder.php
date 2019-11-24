<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AirlineTableSeeder::class);
        $this->call(AirportTableSeeder::class);
        $this->call(BookingSourceTableSeeder::class);
        $this->call(BookingTypeTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(QueryStatusTableSeeder::class);
        $this->call(QueryTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VisaStatusTableSeeder::class);
        $this->call(LogoSeeder::class);
    }
}

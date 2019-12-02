<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Agent',
            'email' => 'agent@agent.com',
            'password' => bcrypt('password'),
            'role' => 2,
        ]);
    }
}

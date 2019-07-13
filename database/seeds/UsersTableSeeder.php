<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'admin',
            'email' => 'izze.pochta@gmail.com',
            'password' => bcrypt('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

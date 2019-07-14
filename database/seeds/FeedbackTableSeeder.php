<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert([
            'name' => Str::random(20),
            'email' => 'test@gmail.com',
            'phone' => '+79158885555',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('feedback')->insert([
            'name' => Str::random(20),
            'email' => 'test1@gmail.com',
            'phone' => '+79158885235',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('feedback')->insert([
            'name' => Str::random(20),
            'email' => 'test2@gmail.com',
            'phone' => '+79157685555',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

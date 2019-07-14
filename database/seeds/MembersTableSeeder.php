<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            DB::table('members')->insert([
                'first_name' => 'Александра',
                'surname' => 'Иванченко',
                'city' => 'Москва',
                'instagram' => Str::random(20),
                'facebook' => Str::random(20),
                'vk' => Str::words(20),
                'twitter' => Str::words(20),
                'info' => Str::random(200),
                'image' => '/storage/photos/shares/O8EvhDPChWw.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

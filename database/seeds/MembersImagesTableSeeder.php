<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/a5c82867ad8eb6b4283ff2ed72f934e6_610.png',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/dfhdfhfdj.png',
            'member_id' => 10
        ]);
    }
}

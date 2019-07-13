<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 250; $i++) {
            DB::table('news')->insert([
                'title' => Str::random(20),
                'slug' => Str::slug('Категория2', '-'),
                'category_id' => rand(1, 7),
                'author' => Str::random(20),
                'text' => Str::random(200),
                'announce' => Str::random(100),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}

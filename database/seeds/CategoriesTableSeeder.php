<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert([
            'name' => 'Категория1',
            'slug' => Str::slug('Категория1', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория2',
            'slug' =>  Str::slug('Категория2', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория3',
            'slug' => Str::slug('Категория3', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория4',
            'slug' => Str::slug('Категория4', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория5',
            'slug' => Str::slug('Категория5', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория6',
            'slug' => Str::slug('Категория6', '-'),
            'status' => 1,
        ]);
        DB::table('news_categories')->insert([
            'name' => 'Категория7',
            'slug' => Str::slug('Категория7', '-'),
            'status' => 1,
        ]);
    }
}

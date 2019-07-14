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
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(NewsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(ModelHasRolesTableSeeder::class);
         $this->call(MembersTableSeeder::class);
         $this->call(MembersImagesTableSeeder::class);
         $this->call(FeedbackTableSeeder::class);
    }
}

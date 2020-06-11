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
        factory(App\Category::class, 5)->create()->each(function ($category) {
            $i = rand(2, 8);
            while (--$i) {
            $category->professeur()->save(factory(App\Professeur::class)->make());
            }
            });
            
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        // \App\Models\Brand::factory(30)->create();
        // \App\Models\Category::factory(40)->create();
        \App\Models\Product::factory(200)->create();

        // $this->call([
        //     BrandsTableSeeder::class,
        //     CategoriesTableSeeder::class
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

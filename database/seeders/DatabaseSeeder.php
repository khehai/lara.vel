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

          $tags = \App\Models\Tag::all();

        \App\Models\Product::all()->each(function ($product) use ($tags) {
            $product->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')->toArray()
            );
        });
        // \App\Models\User::factory(10)->create();
        // \App\Models\Tag::factory(30)->create();
        //  \App\Models\Profile::factory(21)->create();
        // \App\Models\Brand::factory(30)->create();
        // \App\Models\Category::factory(40)->create();
        // \App\Models\Product::factory(200)->create();

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

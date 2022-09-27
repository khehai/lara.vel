<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::insert('INSERT INTO categories (id, name, status, description) VALUES (?, ?, ?, ?)', [1, 'test', 1, 'Test description']);

        $categories = [
            ['name'=>'artisan', 'description'=>'Artisan Categories', 'status'=>1 ],
            ['name'=>'php', 'description'=>'PHP Categories', 'status'=>1],
            ['name'=>'laravel', 'description'=>'Laravel Categories', 'status'=>1],
          ];
        //   \DB::delete('delete from categories');
        // \DB::table('categories')->truncate();
        foreach ($categories as $category) {
           \DB::insert('insert into categories
            (name, status, description, created_at, updated_at) values (?, ?, ?, ?, ?)',
            [   $category['name'],
                $category['status'],
                $category['description'],
                now(),
                now()   ]);
        }
    }
}

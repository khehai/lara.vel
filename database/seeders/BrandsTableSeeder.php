<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name'=>'Artisan', 'description'=>'Artisan Company' ],
            ['name'=>'Php corporation', 'description'=>'PHP Corporation'],
            ['name'=>'Laravel company', 'description'=>'Laravel Company'],
         ];
        //  \DB::delete('delete from brands');
        // \DB::table('brands')->truncate();
        foreach ($brands as $brand) {
           \DB::table('brands')->insert([
               'name' => $brand['name'],
               'description' => $brand['description'],
               'created_at'=>now(),
               'updated_at'=>now()
            ]);
        }
    }
}

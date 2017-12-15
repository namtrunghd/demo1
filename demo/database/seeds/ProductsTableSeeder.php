<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'Despacito',
            'description'=>'Baby',
            'price'=>'12345',
            'photo'=>'No Image'
        ]);
    }
}

<?php

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
        Category::truncate();


        $documento = new Category;
        $documento->nombre = 'Categoria 1';
        $documento->url = 'Categoria-1';
        $documento->save();
    }
}

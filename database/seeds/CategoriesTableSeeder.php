<?php

use App\Category;
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
        $documento->name = 'Categoria 1';
        $documento->description = 'Categoria uno ';
        $documento->save();
    }
}

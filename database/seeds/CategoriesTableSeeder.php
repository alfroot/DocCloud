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
        $documento->name = 'Deportes';
        $documento->description = 'Categoria Deportiva';
        $documento->save();



        $documento = new Category;
        $documento->name = 'Politica';
        $documento->description = 'Categoria sobre Politica';
        $documento->save();

        factory(Category::class,10)->create([ 'category_parent_id' => 1]);
        factory(Category::class,10)->create([ 'category_parent_id' => 2]);
        factory(Category::class,5)->create([ 'category_parent_id' => 5]);
        factory(Category::class,5)->create([ 'category_parent_id' => 8]);
        factory(Category::class,3)->create([ 'category_parent_id' => 12]);
        factory(Category::class,3)->create([ 'category_parent_id' => 16]);
        factory(Category::class,3)->create([ 'category_parent_id' => 17]);
        factory(Category::class,3)->create([ 'category_parent_id' => 20]);
        factory(Category::class,2)->create([ 'category_parent_id' => 33]);
        factory(Category::class,2)->create([ 'category_parent_id' => 38]);

    }
}

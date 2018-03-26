<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::truncate();


        $documento = new Categoria;
        $documento->nombre = 'Categoria 1';
        $documento->url = 'Categoria-1';
        $documento->padre_id = 2 ;
        $documento->save();
    }
}

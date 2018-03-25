<?php

use App\Documento;
use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::truncate();


        $documento = new Documento;
        //$documento->user_id = 1;
        $documento->save();
    }
}

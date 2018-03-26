<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::truncate();


        $documento = new Document;
        //$documento->user_id = 1;
        $documento->save();
    }
}

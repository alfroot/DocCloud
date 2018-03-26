<?php

use App\Document;
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


<<<<<<< Updated upstream:database/seeds/DocumentsTableSeeder.php
        //$documento = new Document;
        //$documento->user_id = 1;
        //$documento->save();
=======
        $documento = new Documento;
        $documento->user_id = 1;
        $documento->save();
>>>>>>> Stashed changes:database/seeds/DocumentosTableSeeder.php
    }
}

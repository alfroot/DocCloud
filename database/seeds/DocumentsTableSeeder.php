<?php
use App\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
        $documento->user_id = 1;
        $documento->name = 'Tutorial de cria de Caracoles';
        $documento->description = 'Tutorial sobre la cria y doma de caracoles serranos, lugares preferidos, apareamiento.';
        $documento->url = 'tutorial-de-cria-de-caracoles';
        $documento->published_at = carbon::now();
        $documento->category_id = 1;
        $documento->save();
    }
}
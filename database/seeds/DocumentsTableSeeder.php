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


        factory(Document::class,50)->create([
            'premium' => '1',
            'price' => '8.99'
        ]);

        factory(Document::class,50)->create([
            'premium' => '1',
            'price' => '12.99'
        ]);

        factory(Document::class,50)->create([
            'premium' => '1',
            'price' => '14.99'
        ]);

        factory(Document::class,50)->create([
            'premium' => '1',
            'price' => '19.99'
        ]);

        factory(Document::class,50)->create([
            'premium' => '0'
        ]);

        for ($i = 1; $i <= 200; $i++) {

            $tag = rand(1,13);
            $document = Document::find($i);
            $document->tags()->attach([$i,$tag]);
            $document->save();

        }
    }
}
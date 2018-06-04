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
        $document = new Document;
        $document->user_id = 1;
        $document->name = 'This is Heading1 Text';
        $document->description = 'This is a regular paragraph with the default style of Normal. This is a regular paragraph with the default style of Normal.';
        $document->url = 'this-is-heading1-text';
        $document->storage = 'documents/XEZH6RuvgXa3V3OWYMCTiEYMDrJq6vojlxSIFfhw.doc';
        $document->category_id = 3;
        $document->extension_id = 1;
        $document->premium = false;
        $document->save();
        $document->tags()->attach(['1','4']);

        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Demonstration of DOCX support in calibre';
        $document->description = 'This document demonstrates the ability of the calibre DOCX Input plugin to convert the various typographic features in a Microsoft Word (2007 and newer) document. Convert this document to a modern ebook format, such as AZW3 for Kindles or EPUB for other ebook readers, to see it in action.';
        $document->url = 'demonstration-of-docx-support-in-calibre';
        $document->storage = 'documents/U2TAsNUo0S29SET3YrhAplnVAatwejQ0c7Gv9q3I.docx';
        $document->category_id = 4;
        $document->extension_id = 2;
        $document->premium = true;
        $document->save();
        $document->tags()->attach(['2','3']);

        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Horarios';
        $document->description = 'Horarios prácticas Marzo 2018';
        $document->url = 'horarios-practicas-marzo-2018';
        $document->storage = 'documents/dJ33FjoEK4yF0Z1DXEBOxquXJ8JMDGrrWqbIsozK.ods';
        $document->category_id = 6;
        $document->extension_id = 3;
        $document->premium = false;
        $document->save();
        $document->tags()->attach(['3','2']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Herencia';
        $document->description = 'JavaScript en un lenguaje orientado a objetos basado en prototipos, en lugar de estar basado en clases. Debido a esta básica diferencia, es menos evidente entender cómo JavaScript nos permite crear herencia entre objetos, y heredar las propiedades y sus valores.';
        $document->url = 'herencia';
        $document->storage = 'documents/VtPUhq4lNRCa1MPCMKZ1I9hUWApJkcAgRizto9HS.odt';
        $document->category_id = 5;
        $document->extension_id = 4;
        $document->premium = true;
        $document->save();
        $document->tags()->attach(['4','1']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'ANEXO-DETECCION ERRORES';
        $document->description = 'JavaScript es un lenguaje de programación interpretado, lo que significa que no se pueden detectar la mayoría de errores en el código hasta que se ejecutan los scripts.';
        $document->url = 'anexo-deteccion-errores';
        $document->storage = 'documents/EkE53GVfQiQDReXgZzKVGrkgGsMLqT6Zemunh4p5.pdf';
        $document->category_id = 8;
        $document->extension_id = 5;
        $document->premium = false;
        $document->save();
        $document->tags()->attach(['5','5']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Presentations-Tips';
        $document->description = 'Presentation Tips description';
        $document->url = 'presentations-tips';
        $document->storage = 'documents/NXW54C77SWDSHZ5Z6s8XoZQLEnH8E5BSJXOaK3eP.ppt';
        $document->category_id = 6;
        $document->extension_id = 6;
        $document->premium = true;
        $document->save();
        $document->tags()->attach(['6','2']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Extreme Presentation';
        $document->description = 'In the Extreme Presentation workshop we discuss the importance of using what graphic designers call the “squint test” when laying out a page.';
        $document->url = 'extreme-presentation';
        $document->storage = 'documents/PX6BjRkZAlfYuQUXKUtkbTMXfmDmZafcAMBbhsiN.pptx';
        $document->category_id = 11;
        $document->extension_id = 7;
        $document->premium = true;
        $document->save();
        $document->tags()->attach(['7','3']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Texto plano';
        $document->description = 'Documento txt de prueba.';
        $document->url = 'texto-plano';
        $document->storage = 'documents/Tur0wQ1XkWvLVcYIQOX2hL5HOdqwBboBphtDbSNL.txt';
        $document->category_id = 7;
        $document->extension_id = 8;
        $document->premium = false;
        $document->save();
        $document->tags()->attach(['8','1']);


        $document = new Document;
        $document->user_id = 1;
        $document->name = 'Documento xls';
        $document->description = 'Documento xls de prueba.';
        $document->url = 'documento-xls';
        $document->storage ='documents/xpRb0EqmOWz2jUlKdaopVDHUkYHHUpAGqk6CfSHx.xls';
        $document->category_id = 3;
        $document->extension_id = 9;
        $document->premium = true;
        $document->save();
        $document->tags()->attach(['9','4']);


        factory(Document::class,10)->create()-;
    }
}
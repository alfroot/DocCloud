<?php

use App\Extension;
use Illuminate\Database\Seeder;

class ExtensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extension::truncate();
        $extension = new Extension;
        $extension->name = 'doc';
        $extension->description = 'Microsoft Word Document';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'docx';
        $extension->description = 'Office Open XML Document';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'ods';
        $extension->description = 'OpenDocument Spreadsheet';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'odt';
        $extension->description = 'OpenDocument Text';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'pdf';
        $extension->description = 'PDF';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'ppt';
        $extension->description = 'Microsoft PowerPoint Document';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'pptx';
        $extension->description = 'Office Open XML Presentation';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'txt';
        $extension->description = 'Documento de Texto Plano';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'xls';
        $extension->description = 'Microsoft Excel Document';
        $extension->save();
    }
}

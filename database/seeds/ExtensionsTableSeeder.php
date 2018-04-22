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
        $extension->save();

        $extension = new Extension;
        $extension->name = 'docx';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'ods';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'odt';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'pdf';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'ppt';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'pptx';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'txt';
        $extension->save();

        $extension = new Extension;
        $extension->name = 'xls';
        $extension->save();
    }
}

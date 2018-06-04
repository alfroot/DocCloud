<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        $payment = new Tag;
        $payment->name='Tesis';
        $payment->save();

        $payment = new Tag;
        $payment->name='Articulo';
        $payment->save();

        $payment = new Tag;
        $payment->name='Manual';
        $payment->save();

        $payment = new Tag;
        $payment->name='Guia';
        $payment->save();

        $payment = new Tag;
        $payment->name='+ 18';
        $payment->save();

        $payment = new Tag;
        $payment->name='Historia';
        $payment->save();

        $payment = new Tag;
        $payment->name='Bibliografia';
        $payment->save();

        $payment = new Tag;
        $payment->name='Opinion';
        $payment->save();

        $payment = new Tag;
        $payment->name='Master';
        $payment->save();

        $payment = new Tag;
        $payment->name='Doctorado';
        $payment->save();

        $payment = new Tag;
        $payment->name='Bibliografia';
        $payment->save();

        $payment = new Tag;
        $payment->name='Pseudo verdad';
        $payment->save();

        $payment = new Tag;
        $payment->name='Idea';
        $payment->save();
    }
}

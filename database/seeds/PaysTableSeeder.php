<?php

use App\Pay;
use Illuminate\Database\Seeder;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pay::truncate();
        $payment = new Pay;
        $payment->user_id = 1;
        $payment->document_id = 1;
        $payment->price='25';
        $payment->save();
    }
}

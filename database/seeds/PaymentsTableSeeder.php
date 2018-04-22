<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();
        $payment = new Payment;
        $payment->user_id = 1;
        $payment->document_id = 1;
        $payment->price='25';
        $payment->save();
    }
}

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

        for ($i = 1; $i <= 50; $i++) {
            for($y = 1; $y <= 60; $y++){
                if ($y%2==0){
                factory(Pay::class, 1)->create([
                'amount' => '8.99',
                'document_id' => $i,
                    'user_id' => $y
                ]);
                }
            }


        }

//        for ($i = 51; $i <= 100; $i++) {
//
//            for($y = 61; $y <= 134; $y++){
//                if ($y%2!=0){
//                    factory(Pay::class, 1)->create([
//                        'amount' => '12.99',
//                        'document_id' => $i,
//                        'user_id' => $y
//                    ]);
//                }
//            }
//
//        }
//
//        for ($i = 101; $i <= 150; $i++) {
//            factory(Pay::class, 1)->create([
//                'amount' => '14.99',
//                'document_id' => $i,
//
//            ]);
//
//        }
//
//        for ($i = 151; $i <= 200; $i++) {
//            factory(Pay::class, 1)->create([
//                'amount' => '19.99',
//                'document_id' => $i
//            ]);
//
//        }
//
//
    }


}

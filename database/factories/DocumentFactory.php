<?php

use App\Document;
use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {

    $name = $faker->text($nbWords = 7, $variableNbWords = true);

          $doc[1] = 'documents/XEZH6RuvgXa3V3OWYMCTiEYMDrJq6vojlxSIFfhw.doc';
          $doc[2]= 'documents/U2TAsNUo0S29SET3YrhAplnVAatwejQ0c7Gv9q3I.docx';
          $doc[3] = 'documents/dJ33FjoEK4yF0Z1DXEBOxquXJ8JMDGrrWqbIsozK.ods';
          $doc[4] = 'documents/VtPUhq4lNRCa1MPCMKZ1I9hUWApJkcAgRizto9HS.odt';
          $doc[5] = 'documents/EkE53GVfQiQDReXgZzKVGrkgGsMLqT6Zemunh4p5.pdf';
          $doc[6] = 'documents/NXW54C77SWDSHZ5Z6s8XoZQLEnH8E5BSJXOaK3eP.ppt';
          $doc[7] = 'documents/PX6BjRkZAlfYuQUXKUtkbTMXfmDmZafcAMBbhsiN.pptx';
          $doc[8] = 'documents/Tur0wQ1XkWvLVcYIQOX2hL5HOdqwBboBphtDbSNL.txt';
          $doc[9] = 'documents/xpRb0EqmOWz2jUlKdaopVDHUkYHHUpAGqk6CfSHx.xls';


            $ext[1] = '1';
            $ext[2] = '2';
            $ext[3] = '3';
            $ext[4] = '4';
            $ext[5] = '5';
            $ext[6] = '6';
            $ext[7] = '7';
            $ext[8] = '8';
            $ext[9] = '9';



            $random = rand(1,9);

    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');

    return [


        'user_id' => $faker->numberBetween(1,190),
        'name' => $name,
        'description'=> $faker->text($maxNbChars = 140),
        'url' => str_slug($name),
        'storage' => $doc[$random],
        'category_id' => $faker->numberBetween(2,84),
        'extension_id' => $ext[$random],
        'created_at' => $date,
        'updated_at' => $date,




    ];
});

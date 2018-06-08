<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ExtensionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(PaysTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}

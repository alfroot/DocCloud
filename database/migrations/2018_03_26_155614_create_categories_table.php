<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedInteger('category_parent_id')->nullable();
            $table->timestamps();
<<<<<<< Updated upstream:database/migrations/2018_03_26_155614_create_categories_table.php
=======
            $table->unsignedInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
>>>>>>> Stashed changes:database/migrations/2018_03_25_114048_create_documentos_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->mediumText('description');
            $table->string('url');
<<<<<<< Updated upstream:database/migrations/2018_03_26_155630_create_documents_table.php
            $table->unsignedInteger('category_id');
=======
            $table->unsignedInteger('padre_id')->nullable();
>>>>>>> Stashed changes:database/migrations/2018_03_25_114108_create_categorias_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}

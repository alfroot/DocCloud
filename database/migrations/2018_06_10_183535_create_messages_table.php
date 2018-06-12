<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from');
            $table->foreign('from')->references('id')->on('users');
            $table->unsignedInteger('to');
            $table->foreign('to')->references('id')->on('users');
            $table->text('body');
            $table->text('subject');
            $table->boolean('read');
            $table->unsignedInteger('response')->nullable();
            $table->foreign('response')->references('id')->on('messages')->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}

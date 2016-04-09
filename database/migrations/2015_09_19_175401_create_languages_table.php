<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('questions_languages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')
                ->onDelete('cascade');

            $table->integer('language_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('languages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions_languages');
        Schema::drop('languages');
    }
}

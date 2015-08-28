<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
        });

        // add the question_id foreign key
        // which references the questions.id column
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the question_id foreign key
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_question_id_foreign');
        });

        Schema::drop('comments');
    }
}

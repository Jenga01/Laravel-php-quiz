<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create(
            'answers',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('answer');
                $table->boolean('is_correct');
                $table->bigInteger('question_id')->unsigned();
                $table->foreign('question_id')->references('id')->on('questions');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}

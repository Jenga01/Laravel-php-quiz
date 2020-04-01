<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create(
            'results',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('selected_answer');
                $table->bigInteger('test_id')->unsigned();
                $table->foreign('test_id')->references('id')->on('tests');
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
        Schema::dropIfExists('results');
    }
}

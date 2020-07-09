<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerPoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('vote');
            $table->timestamps();

            $table->foreign('answer_id')
            ->references('id')->on('answers')
            ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('answer_points');
    }
}

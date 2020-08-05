<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->text('body');
			$table->unsignedBigInteger('pokemon_information_id');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('pokemon_information_id')->references('id')->on('pokemon_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_comments');
    }
}

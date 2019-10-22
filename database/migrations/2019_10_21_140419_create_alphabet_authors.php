<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlphabetAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alphabet_authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('letter_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('letter_id')->references('id')->on('alphabets')->onDelete('cascade');
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
        Schema::dropIfExists('authors_alphabet');
    }
}

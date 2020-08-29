<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('themoviedb_id');
            $table->boolean('adult');
            $table->string('backdrop_path')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->string('homepage')->nullable();
            $table->string('imdb_id')->nullable();
            $table->string('original_language')->nullable();
            $table->string('original_title')->nullable();
            $table->text('overview')->nullable();
            $table->decimal('popularity')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('release_date')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->integer('runtime')->nullable();
            $table->string('status')->nullable();
            $table->string('tagline')->nullable();
            $table->text('title')->nullable();
            $table->boolean('video')->nullable();
            $table->decimal('vote_average')->nullable();
            $table->bigInteger('vote_count')->nullable();

            $table->json('belongs_to_collection')->nullable();
            $table->json('genres')->nullable();
            $table->json('production_companies')->nullable();
            $table->json('production_countries')->nullable();
            $table->json('spoken_languages')->nullable();

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
        Schema::dropIfExists('movies');
    }
}

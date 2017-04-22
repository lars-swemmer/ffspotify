<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotifyArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spotify_artists', function (Blueprint $table) {
            $table->increments('id');

            $table->string('spotify_id')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('avatar')->nullable();
            $table->string('image_playlist')->nullable();
            $table->string('image_background')->nullable();

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
        Schema::dropIfExists('spotify_artists');
    }
}

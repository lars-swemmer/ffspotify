<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');

            $table->string('google_page_views')->nullable();
            $table->string('spotify_users')->nullable();
            $table->string('spotify_playlist_followers')->nullable();
            $table->string('spotify_artist_followers')->nullable();
            $table->string('new_google_page_views')->nullable();
            $table->string('new_spotify_users')->nullable();
            $table->string('new_spotify_playlist_followers')->nullable();
            $table->string('new_spotify_artist_followers')->nullable();

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
        Schema::dropIfExists('performances');
    }
}

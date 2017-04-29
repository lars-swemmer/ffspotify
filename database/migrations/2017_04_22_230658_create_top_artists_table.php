<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_artists', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('spotify_user_id')->unsigned()->nullable();
            $table->foreign('spotify_user_id')->references('id')->on('spotify_users');
            $table->string('external_url')->nullable();
            $table->string('spotify_id')->nullable();
            $table->string('name')->nullable();

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
        Schema::dropIfExists('top_artists');
    }
}

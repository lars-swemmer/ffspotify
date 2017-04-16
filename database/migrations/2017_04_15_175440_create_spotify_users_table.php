<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spotify_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name')->nullable();
            $table->string('external_urls')->nullable();
            $table->string('followers')->nullable();
            $table->string('href')->nullable();
            $table->string('spotify_id')->nullable();
            $table->string('images')->nullable();
            $table->string('type')->nullable();
            $table->string('uri')->nullable();
            $table->string('accessToken')->nullable();
            $table->string('refreshToken')->nullable();
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
        Schema::dropIfExists('spotify_users');
    }
}

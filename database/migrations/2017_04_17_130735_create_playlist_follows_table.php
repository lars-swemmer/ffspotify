<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spotify_user_id')->unsigned()->nullable();
            $table->foreign('spotify_user_id')->references('id')->on('spotify_users');
            $table->string('new_follow')->nullable();
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
        Schema::dropIfExists('playlist_follows');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpotifyPlaylistIdToPlaylistFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playlist_follows', function (Blueprint $table) {
            $table->integer('spotify_playlist_id')->unsigned()->nullable()->after('spotify_user_id');
            $table->foreign('spotify_playlist_id')->references('id')->on('spotify_playlists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlist_follows', function (Blueprint $table) {
            $table->dropForeign('playlist_follows_spotify_playlist_id_foreign');
            $table->dropColumn('spotify_playlist_id');
        });
    }
}

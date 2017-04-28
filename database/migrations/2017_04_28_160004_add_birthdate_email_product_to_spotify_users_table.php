<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdateEmailProductToSpotifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spotify_users', function (Blueprint $table) {
            $table->string('birthdate')->after('country')->nullable();
            $table->string('email')->after('country')->nullable();
            $table->string('product')->after('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spotify_users', function (Blueprint $table) {
            $table->dropColumn(['birthdate', 'email', 'product']);
        });
    }
}

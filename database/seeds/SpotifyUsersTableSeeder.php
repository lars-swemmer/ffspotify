<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotifyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	// App\PlaylistFollow::truncate();
    	// App\ArtistFollow::truncate();
    	// App\SpotifyUser::truncate();
    	// DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = factory(App\SpotifyUser::class, 100)->create()
        ->each(function($u) {
        	$user_id = $u->id;
        	$u->playlistFollows()->save(factory(App\PlaylistFollow::class)->create(['spotify_user_id' => $user_id]));
        	$u->artistFollow()->save(factory(App\ArtistFollow::class)->create(['spotify_user_id' => $user_id]));
        });
    }
}

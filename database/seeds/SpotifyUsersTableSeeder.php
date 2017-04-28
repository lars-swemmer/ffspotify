<?php

use Illuminate\Database\Seeder;

class SpotifyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\SpotifyUser::class, 10000)->create()
        ->each(function($u) {
        	$user_id = $u->id;
        	$u->playlistFollows()->save(factory(App\PlaylistFollow::class)->create(['spotify_user_id' => $user_id]));
        	$u->artistFollow()->save(factory(App\ArtistFollow::class)->create(['spotify_user_id' => $user_id]));
        });
    }
}

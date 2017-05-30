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
        for ($x = 14; $x > 0; $x--) {
            if ($x == 14) {
            	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            	App\PlaylistFollow::truncate();
            	App\ArtistFollow::truncate();
            	App\SpotifyUser::truncate();
                App\Performance::truncate();
            	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $date = Carbon\Carbon::today()->subDays($x-1);
            $amount = rand(0, 0);

            $users = factory(App\SpotifyUser::class, $amount)->create([
                'created_at' => $date,
                'updated_at' => $date
            ])
            ->each(function($u) use($date) {
            	$user_id = $u->id;
            	$u->playlistFollows()->save(factory(App\PlaylistFollow::class)->create([
                    'spotify_user_id' => $user_id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]));
            	$u->artistFollow()->save(factory(App\ArtistFollow::class)->create([
                    'spotify_user_id' => $user_id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]));
            });

            $performances = factory(App\Performance::class, 1)->create([
                'new_spotify_users' => $amount,
                'date' => Carbon\Carbon::parse($date)->format('Y-m-d'),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}

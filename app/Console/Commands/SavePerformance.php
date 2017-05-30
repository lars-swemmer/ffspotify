<?php

namespace App\Console\Commands;

use App\ArtistFollow;
use App\Performance;
use App\PlaylistFollow;
use App\SpotifyUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SavePerformance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fanbase:performance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saves perforance of fanbase on daily basis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // haal totaal aantal users op
        $users = SpotifyUser::all()->count();
        $usersNew = SpotifyUser::where('created_at', '>', Carbon::yesterday())->count();

        // dit kan ook via carbon::yesterday(); want dit werkt alleen als er een gebruiker is laatste dag?
        // $date = SpotifyUser::orderBy('created_at', 'desc')->pluck('created_at')->first();
        $date = Carbon::today();

        // haal totaal aantal playlist followers op
        $playlistFollowers = PlaylistFollow::where('new_follow', '1')->count();
        $playlistFollowersToday = PlaylistFollow::where('new_follow', '1')->where('created_at', '=', $date)->count();

        // haal totaal aantal artist followers op
        $artistFollowers = ArtistFollow::where('new_follow', '1')->count();
        $artistFollowersToday = ArtistFollow::where('new_follow', '1')->where('created_at', '=', $date)->count();

        $this->info('datum vandaag: ' .Carbon::today());

        //maak performance aan of update als al bestaat
            $performance = Performance::updateOrCreate(
                ['date' => Carbon::today()->format('Y-m-d')],
                [
                    'spotify_users' => $users,
                    'spotify_playlist_followers' => $playlistFollowers,
                    'spotify_artist_followers' => $artistFollowers,
                    'new_spotify_users' => $usersNew,
                    'new_spotify_playlist_followers' => $playlistFollowersToday,
                    'new_spotify_artist_followers' => $artistFollowersToday,
                ]
            );

        $this->info('fanbase:performance completed on: '.Carbon::today());
    }
}

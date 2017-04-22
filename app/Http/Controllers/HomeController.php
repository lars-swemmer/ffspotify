<?php

namespace App\Http\Controllers;

use App\ArtistFollow;
use App\PlaylistFollow;
use App\SpotifyArtist;
use App\SpotifyPlaylist;
use App\SpotifyUser;
use App\TopArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = SpotifyUser::take(20)->get();
        $usersTotal = SpotifyUser::all()->count();
        $artistFollowers = ArtistFollow::where('new_follow', '1')->count();
        $playlistFollowers = PlaylistFollow::where('new_follow', '1')->count();

        $topArtists = DB::table('top_artists')
            ->selectRaw('name, COUNT(*) as count')
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();

        $topCountries = DB::table('spotify_users')
            ->selectRaw('country, COUNT(*) as count')
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->get();

        return view('home', compact('users', 'usersTotal', 'artistFollowers', 'playlistFollowers', 'topArtists', 'topCountries'));
    }

    /**
     * Show the fanbase users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        // pagination inbouwen
        $users = SpotifyUser::take(20)->get();

        return view('fanbase.users', compact('users'));
    }

    /**
     * Show the fanbase playlists.
     *
     * @return \Illuminate\Http\Response
     */
    public function playlists()
    {
        // pagination inbouwen
        $playlists = SpotifyPlaylist::withCount('playlistFollows')->take(20)->get();

        return view('fanbase.playlists', compact('playlists'));
    }

    /**
     * Show the top artists
     *
     * @return \Illuminate\Http\Response
     */
    public function topArtists()
    {
        $topArtists = DB::table('top_artists')
            ->selectRaw('name, COUNT(*) as count')
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->get();

        return view('fanbase.top-artists', compact('topArtists'));
    }

    /**
     * Show the artist spotify analytics.
     *
     * @return \Illuminate\Http\Response
     */
    public function artist()
    {
        $artist = SpotifyArtist::first();

        return view('fanbase.artist', compact('artist'));
    }
}

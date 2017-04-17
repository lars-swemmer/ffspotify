<?php

namespace App\Http\Controllers;

use App\ArtistFollow;
use App\PlaylistFollow;
use App\SpotifyUser;
use Illuminate\Http\Request;

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

        return view('home', compact('users', 'usersTotal', 'artistFollowers', 'playlistFollowers'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
    	'spotify_users',
    	'spotify_playlist_followers',
    	'spotify_artist_followers',
    	'new_google_page_views',
    	'new_spotify_users',
    	'new_spotify_playlist_followers',
    	'new_spotify_artist_followers',
    	'date',
    ];
}

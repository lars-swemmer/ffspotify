<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistFollow extends Model
{
    protected $fillable = [
    	'spotify_user_id',
    	'spotify_playlist_id',
    	'new_follow',
    ];

    public function spotifyUser()
    {
    	return $this->belongsTo('App\SpotifyUser');
    }
}

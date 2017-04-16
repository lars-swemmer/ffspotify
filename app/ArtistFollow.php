<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistFollow extends Model
{
    protected $fillable = [
    	'spotify_user_id',
    	'new_follow',
    ];

    public function spotifyUser()
    {
    	return $this->belongsTo('App\SpotifyUser');
    }
}

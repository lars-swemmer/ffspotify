<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotifyUser extends Model
{
    protected $fillable = [
    	'display_name',
    	'external_urls',
    	'followers',
    	'href',
    	'spotify_id',
    	'images',
    	'type',
    	'uri',
    	'accessToken',
    	'refreshToken',
    ];

    public function artistFollow()
    {
    	return $this->hasOne('App\ArtistFollow');
    }
}

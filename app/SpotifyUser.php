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
        'country',
        'birthdate',
        'email',
        'product',
    	'accessToken',
    	'refreshToken',
    ];

    public function artistFollow()
    {
    	return $this->hasOne('App\ArtistFollow');
    }

    public function playlistFollows()
    {
        return $this->hasMany('App\PlaylistFollow');
    }
}

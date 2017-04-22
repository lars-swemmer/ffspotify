<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotifyPlaylist extends Model
{
    public function playlistFollows()
    {
        return $this->hasMany('App\PlaylistFollow');
    }
}

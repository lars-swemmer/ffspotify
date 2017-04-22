<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopArtist extends Model
{
    protected $fillable = [
    	'spotify_user_id',
    	'external_url',
    	'spotify_id',
    	'name',
    ];
}

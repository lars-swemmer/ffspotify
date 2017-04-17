<?php

namespace App\Http\Controllers;

use App\ArtistFollow;
use App\PlaylistFollow;
use App\SpotifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SpotifyWebAPI;

class SpotifyController extends Controller
{
    public function index()
    {
    	// auth credentials
		$session = new SpotifyWebAPI\Session(
		    '1beaa1a1cf2f4680917bc116a61beaf3',
		    '7dc2b417205b4c0fabe5f9c4587bb558',
		    'http://ffspotify.dev/callback/'
		);

		$options = [
		    'scope' => [
		        'user-follow-read',
		        'user-follow-modify',
		        'playlist-modify-public',
		    ],
		];

		$oauthUrl = $session->getAuthorizeUrl($options);

	    // client credentials
		$session->requestCredentialsToken();
		$accessToken = $session->getAccessToken();

		$api = new SpotifyWebAPI\SpotifyWebAPI();
		$api->setAccessToken($accessToken);

		$albums = $api->getArtistAlbums('6cEuCEZu7PAE9ZSzLLc2oQ', ['album_type' => 'single', 'limit' => '8']);

		return view('spotify.index', compact('albums', 'oauthUrl'));
    }

    public function callback()
    {
    	$error = Input::get('error');
		$code = Input::get('code');

		if ($error != '') {
			return 'An error has occured: ' .$code;
			// log to errors database log
			// ...
		}

		if ($code != '') {

			// Spotify API setup
			$session = new SpotifyWebAPI\Session('1beaa1a1cf2f4680917bc116a61beaf3', '7dc2b417205b4c0fabe5f9c4587bb558', 'http://ffspotify.dev/callback/');
			$session->requestAccessToken($_GET['code']);
			$accessToken = $session->getAccessToken();

			$api = new SpotifyWebAPI\SpotifyWebAPI();
			$api->setAccessToken($accessToken);

			// 1. saveCurrentUserProfile()
			$spotify_user = $this->saveCurrentUserProfile($api->me(), $session);

			// 2.1 works (checkt of gebruiker artiest volgt) (artist id dynamisch maken vanuit DB)
			$currentUserFollowsArtist = $api->currentUserFollows('artist', '6cEuCEZu7PAE9ZSzLLc2oQ');
			$this->saveArtistFollow($currentUserFollowsArtist, $spotify_user);

			// 2.2 works (laat gebruiker artiest volgen) (artist id dynamisch maken vanuit DB)
			$api->followArtistsOrUsers('artist', '6cEuCEZu7PAE9ZSzLLc2oQ');

			// 3.1 works (checkt of gebruiker playlist volgt, moet spotify_id meegeven) (playlist id dynamisch maken vanuit DB met artiest naam dus?)
			$currentUserFollowsPlaylist = $api->userFollowsPlaylist('r3hab', '5zXU4g6vN5cDpDo7ei6PsZ' ,['ids' => $spotify_user->spotify_id]);
			$this->savePlaylistFollow($currentUserFollowsPlaylist, $spotify_user);

			// 3.2 works (laat gebruiker playlist volgen)
			$api->followPlaylist('r3hab', '5zXU4g6vN5cDpDo7ei6PsZ');

			// completed steps ook alleen als nieuwe gebruiker is? anders als iemand nog keer steeps doorloopt betaal je wel? Refresh success page is al wel hiermee opgelost
			return redirect()->route('success')->with('completed_steps', true);

			/////////////////////////////////////////////// TODO ///////////////////////////////////////////////

			// works (laat gebruiker playlist volgen)
			// $api->followPlaylist('r3hab', '5zXU4g6vN5cDpDo7ei6PsZ');

			// works (haalt gebruiker zijn 50 laatst gespeelde tracks op)
			// $recentTracks = $api->getMyRecentTracks(['limit' => '50']);

			// works (haalt gebruiker zijn favoriete tracks op op basis van affiniteits score)
			// $topTracks = $api->getMyTop('tracks'); // default limit 20 (is genoeg?)

			// works (haalt gebruiker zijn favoriete artisten op op hasis van affiniteits score)
			// $topArtists = $api->getMyTop('artists'); // default limit 20 (is genoeg?)

			// works (haalt gebruiker zijn gevolgde artiesten op, limit 50)
			// $followedArtists = $api->getUserFollowedArtists();

			// dd($followedArtists);

			/////////////////////////////////////////////// END TODO ///////////////////////////////////////////

			return 'Succesfull connection';
	    }

	    return 'Something strange happend, please try to connect again. Response code:' .$code;
		// log to errors database log
		// ...
	}

	public function success()
	{
		$session = new SpotifyWebAPI\Session(
		    '1beaa1a1cf2f4680917bc116a61beaf3',
		    '7dc2b417205b4c0fabe5f9c4587bb558',
		    'http://ffspotify.dev/callback/'
		);

		// client credentials
		$session->requestCredentialsToken();
		$accessToken = $session->getAccessToken();

		$api = new SpotifyWebAPI\SpotifyWebAPI();
		$api->setAccessToken($accessToken);

		$albums = $api->getArtistAlbums('6cEuCEZu7PAE9ZSzLLc2oQ', ['album_type' => 'single', 'limit' => '8']);

		return view('spotify.success', compact('albums'));
	}


	// als geen plaatje is kan je geen images[0] doet
	public function saveCurrentUserProfile($me, $session)
	{
		$spotify_user = SpotifyUser::updateOrCreate(
			['spotify_id' => $me->id], [
				'display_name' => $me->display_name,
				'external_urls' => $me->external_urls->spotify,
				'followers' => $me->followers->total,
				'href' => $me->href,
				'spotify_id' => $me->id,
				'images' => 'test',
				'type' => $me->type,
				'uri' => $me->uri,
				'accessToken' => $session->getAccessToken(),
				'refreshToken' => $session->getRefreshToken(),
			]
		);
		return $spotify_user;
	}

	public function saveArtistFollow($currentUserFollowsArtist, $spotify_user)
	{
		$new_follow = ($currentUserFollowsArtist[0] == false ? '1' : '0'); // returns true

		// moet nog associeren met een playlist, mocht deze veranderen, dus firstOrCreate zoeken op id en playlist_Id
		$artist_follow = ArtistFollow::firstOrCreate(
			['spotify_user_id' => $spotify_user->id],
			['new_follow' => $new_follow]
		);
	}

	public function savePlaylistFollow($currentUserFollowsPlaylist, $spotify_user)
	{
		$new_follow = ($currentUserFollowsPlaylist[0] == false ? '1' : '0'); // returns true

		// moet nog associeren met een playlist, mocht deze veranderen, dus firstOrCreate zoeken op id en playlist_Id
		$playlist_follow = PlaylistFollow::firstOrCreate(
			['spotify_user_id' => $spotify_user->id],
			['new_follow' => $new_follow]
		);
	}
}

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\SpotifyUser::class, function (Faker\Generator $faker) {

    return [
        'display_name' => $faker->name,
        'external_urls' => $faker->url,
        'followers' => $faker->numberBetween('1', '100'),
        'href' => $faker->url,
        'spotify_id' => $faker->userName,
        'images' => $faker->imageUrl,
        'type' => 'user',
        'uri' => $faker->url,
        'country' => $faker->countryCode,
        'product' => $faker->randomElement($array = array ('premium','free')),
        'email' => $faker->unique()->safeEmail,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'accessToken' => str_random(256),
        'refreshToken' => str_random(256),
    ];
});

$factory->define(App\PlaylistFollow::class, function (Faker\Generator $faker) {

    return [
        'spotify_user_id' => '1',
        'spotify_playlist_id' => $faker->numberBetween(1, 3),
        'new_follow' => $faker->numberBetween('0', '1'),
    ];
});

$factory->define(App\ArtistFollow::class, function (Faker\Generator $faker) {

    return [
        'spotify_user_id' => '1',
        'new_follow' => $faker->numberBetween('0', '1'),
    ];
});

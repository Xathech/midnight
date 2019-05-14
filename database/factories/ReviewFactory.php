<?php

use App\User;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {

    //factory(App\Review::class, 5)->create();

    //Variables

    $users_id = User::pluck('id');//retrieve all user id's as collections passed to array

    $images = array(
        'images/tests/1.jpg',
        'images/tests/2.jpg',
        'images/tests/3.jpg'
    );

    $locales = LaravelLocalization::getSupportedLanguagesKeys();

    return [
        'user_id' => $faker->randomElement($users_id),
        'title' => $faker->realText($maxNbChars = 100),
        'game_title' => $faker->realText($maxNbChars = 100),
        'votes' => $faker->numberBetween($min = 0, $max = 8000),
        'body' => $faker->realText($maxNbChars = 600),
        'image' => $faker->randomElement($images),
        'language' => $faker->randomElement($locales),
    ];
});
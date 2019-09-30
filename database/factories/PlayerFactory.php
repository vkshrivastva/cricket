<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Player;
use App\Models\Country;
use App\Models\Team;

$factory->define(\App\Models\Player::class, function (Faker $faker) {
    $countries = Country::all()->pluck('id');
    $teams     = Team::all()->pluck('id');

//matches, run, highest scores, fifties, hundreds,
    return [
        Player::FIRST_NAME => $faker->firstName,
        Player::LAST_NAME  => $faker->lastName,
        Player::JERSEY_NO  => rand(1, 100),
        Player::IMAGE_URI  => '',
        Player::COUNTRY_ID => $faker->randomElement($countries),
        Player::TEAM_ID    => $faker->randomElement($teams),
        Player::HISTORY    => json_encode(
            [
                'matches' => $faker->numberBetween(100, 500),
                'run'     => $faker->numberBetween(1000, 20000),
                'scores'  => $faker->numberBetween(100, 300),
                'fifties' => $faker->numberBetween(1, 100),
                'hundred' => $faker->numberBetween(1, 100),
                'matches' => $faker->numberBetween(1, 500),
                'four'    => $faker->numberBetween(10, 1000),
                'six'     => $faker->numberBetween(10, 500),
            ]
        )
    ];
});

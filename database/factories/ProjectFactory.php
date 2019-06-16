<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->company,
        'desc' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'user_id' => '1',
        'image' => $faker->company,
    ];
});

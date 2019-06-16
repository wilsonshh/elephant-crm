<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Lead;
use Faker\Generator as Faker;

$factory->define(Lead::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->company,
        'value' =>  $faker->numberBetween($min = 1000, $max = 9000),
        'project_id' => '1',
        'user_id' => '1',
        'activity' => $faker->randomElement($array = array ('Email','Presentation', 'Meeting', 'Call', 'Other')),
        'contact_id' => '1',
    ];
});

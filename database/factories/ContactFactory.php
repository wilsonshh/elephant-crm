<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'job_title' => $faker->jobTitle,
        'gender' => $faker->randomElement($array = array ('Male','Female','Other')),
        'profile_image' => "https://ui-avatars.com/api/?name=" . $faker->name,
        'user_id' => '1',

    ];
});

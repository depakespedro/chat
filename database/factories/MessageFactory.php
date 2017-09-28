<?php

$factory->define(\App\Message::class, function (Faker $faker) {

    return [
        'text' => $faker->text(100),
        'user_id' => factory(\App\User::class)->create(),
    ];
});
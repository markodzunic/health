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
        'role_id' => 2,
        'title' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'avatar' => 'avatar.jpg',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'first_name' => $faker->word,
    		'last_name' => $faker->word,
    		'date_of_birth' => $faker->word,
    		'position_type' => $faker->word,
    		'gender' => $faker->word,
    		'phone' => $faker->word,
    		'occupation' => $faker->word,
    		'med_reg_number' => $faker->word,
    		'authorised_user' => 0,
    		'active' => 0,
    ];
});

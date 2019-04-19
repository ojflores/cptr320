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

// keeping the student one for reference
/*$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'preferred_name' => $faker->firstName,
        'email' => $faker->safeEmail,
        'graduation_year' => $faker->numberBetween('2019', '2023'),
        'birth_date' => $faker->dateTimeBetween('-22 years', '-18 years'),
        'created_at' => $faker->dateTimeBetween('-5 years', '-2 years'),
        'updated_at' => $faker->dateTimeBetween('-1 years'),
    ];
});*/

$factory->define(App\Player::class, function (Faker\Generator $faker) {
    $teamIds = DB::table('teams')->pluck('team_id');
    $free_agent = $faker->numberBetween('0', '1');
    if ($free_agent == 1) {
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'team_id' => NULL,
            'free_agent' => $free_agent
        ];
    }
    else {
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'team_id' => $teamIds,
            'free_agent' => $free_agent
        ];
    }
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'team_name' => $faker->colorName, // is this the correct way to access football team names? CHANGE LATER
    ];
});

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'post_type_id' => 2,
        'status' => 'PUBLISH',
        'publish_date' => date('Y-m-d'),
        'created_by' => 1
    ];
});

$factory->define(App\Models\PostDetail::class, function (Faker\Generator $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $slug = str_slug($title, '-');
    return [
        'lang' => 'en',
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->realText(250, 2)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //Rellena las columnas user_id y forum_id (claves foraneas) con valores aleatorios
        //ya existentes en las tablas a las que apunta
        //Las factorias de las tablas a las que apuntan ya tienen que estar creadas
        'user_id' => \App\User::all()->random()->id,
        'forum_id' => \App\Forum::all()->random()->id,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});

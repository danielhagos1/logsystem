<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
      return [
        'title' => $faker->text,
         'image' => $faker->image('public/images', 400, 300, null, false),
        'body' =>$faker->paragraph
    ];
});
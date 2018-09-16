<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        // Con ucfirst la primer letra va en mayuscula
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence(10)

    ];
});

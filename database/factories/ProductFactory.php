<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => Str::random(5),
        'slug' => $faker->unique()->numberBetween(1000000, 1000000000),
        'short_description' => Str::random(10),
        'description' => Str::random(100),
        'regular_price' => $faker->numberBetween(500, 1000),
        'stock_status' => 'instock',
        'quantity' => $faker->numberBetween(100, 1000),
    ];
});

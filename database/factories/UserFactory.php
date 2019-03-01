<?php

use App\Services\CryptService;
use App\Models\User;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    /** @var CryptService $cryptService */
    $cryptService = app()->make(CryptService::class);
    return [
        'username' => $faker->userName,
        'password' => $cryptService->encrypt('password'),
    ];
});
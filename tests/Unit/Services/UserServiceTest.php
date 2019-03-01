<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\CryptService;
use App\Services\UserService;
use Faker\Factory as Faker;
use Tests\DBTestCase;

class UserServiceTest extends DBTestCase
{
    public function testAuthenticate()
    {
        $faker = Faker::create();
        $cryptService = new CryptService();
        $userService = new UserService();

        $username = $faker->userName;
        $password = $faker->password;

        $user = factory(User::class)->create([
            'pid' => $faker->numberBetween(100, 1000),
            'username' => $username,
            'password' => $cryptService->encrypt($password)
        ]);

        $this->assertTrue(
            $userService->authenticate($username, $password)
        );
        $this->assertFalse(
            $userService->authenticate($username, "this will fail")
        );

        $user->delete();
    }
}
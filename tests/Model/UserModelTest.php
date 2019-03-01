<?php

namespace Tests\Model;

use App\Models\User;
use App\Services\CryptService;
use Faker\Factory as Faker;
use Tests\DBTestCase;

class UserModelTest extends DBTestCase
{
    public function testUser()
    {
        $cryptService = new CryptService();

        $faker = Faker::create();

        $pid = $faker->numberBetween(100, 1000);
        $username = $faker->userName;
        $encryptedPassword = $cryptService->encrypt($faker->password);

        /** @var User $user */
        $user = factory(User::class)->create([
            'pid' => $pid,
            'username' => $username,
            'password' => $encryptedPassword,
        ]);

        $fetchedUser = User::find($pid);

        foreach ($user->toArray() as $field => $value) {
            $this->assertEquals($value, $fetchedUser->{$field});
        }

        $fetchedUser->delete();

    }
}
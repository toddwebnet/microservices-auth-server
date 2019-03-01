<?php

use App\Services\CryptService;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var CryptService $cryptService */
        $cryptService = app()->make(CryptService::class);

        factory(User::class)->create([
            'pid' => 1,
            'username' => 'root',
            'password' => $cryptService->encrypt('password')
        ]);
    }
}

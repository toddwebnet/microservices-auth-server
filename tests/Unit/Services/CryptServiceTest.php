<?php

namespace Tests\Unit\Services;

use App\Services\CryptService;
use Faker\Factory as Faker;
use Tests\TestCase;

class CryptServiceTest extends TestCase
{
    public function testEncrypt(){
        //validating method of encrypt is md5
        $cryptService = new CryptService();
        $faker = Faker::create();
        for($x=0;$x<10;$x++){
            $word = $faker->word;
            $expectedValue = md5($word);
            $this->assertEquals($expectedValue, $cryptService->encrypt($word));
        }
    }
}
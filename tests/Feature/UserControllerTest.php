<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

    public function testAuthenticatePass()
    {

        $username = 'test';
        $password = "pass";
        $params = [
            'username' => $username,
            'password' => $password,
        ];

        $this->setMock(UserService::class)
            ->shouldReceive('authenticate')
            ->withArgs([$username,$password])
            ->andReturnTrue();

        $endpoint = '/authenticate';
        $response = $this->post($endpoint, $params);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

    }
    public function testAuthenticateFail()
    {

        $username = 'test';
        $password = "pass";
        $params = [
            'username' => $username,
            'password' => $password,
        ];

        $this->setMock(UserService::class)
            ->shouldReceive('authenticate')
            ->withArgs([$username,$password])
            ->andReturnFalse();

        $endpoint = '/authenticate';
        $response = $this->post($endpoint, $params);
        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $response->getStatusCode());

    }

}
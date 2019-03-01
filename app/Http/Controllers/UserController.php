<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use IDevCode\Services\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function authenticate(Request $request)
    {
        /** @var UserService $userService */
        $userService = app()->make(UserService::class);

        if ($userService->authenticate(
            $request->input('username'),
            $request->input('password')
        )) {
            return (new ApiResponse(Response::HTTP_OK))
                ->getResponse('pass');
        } else {
            return (new ApiResponse(Response::HTTP_UNAUTHORIZED))
                ->getResponse('unauthorized');
        }
    }
}
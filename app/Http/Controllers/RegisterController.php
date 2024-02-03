<?php

namespace App\Http\Controllers;

use App\DTO\RegisterUserDTO;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;

class RegisterController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request, UserService $userService)
    {
        $userDTO = RegisterUserDTO::fromArray($request->all());
        $data = $userService->registerUser($userDTO);
        return $this->successResponse('User registered!', $data);
    }
}

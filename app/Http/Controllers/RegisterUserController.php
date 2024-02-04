<?php

namespace App\Http\Controllers;

use App\DTO\RegisterUserDTO;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;

class RegisterUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request, UserService $userService)
    {
        $userDTO = RegisterUserDTO::fromArray($request->all());
        $data = $userService->registerUser($userDTO);

        return $this->jsonSuccess('User registered!', $data);
    }
}

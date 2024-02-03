<?php

namespace App\Http\Controllers;

use App\DTO\LoginUserDTO;
use App\Http\Requests\AuthUserRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthUserRequest $request, AuthService $authService)
    {
        $credentials = LoginUserDTO::fromArray($request->all());
        $data = $authService->authenticate($credentials);
        return $this->successResponse('Logged in!', $data);
    }
}

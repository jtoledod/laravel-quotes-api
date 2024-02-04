<?php

namespace App\Http\Controllers;

use App\DTO\AuthUserDTO;
use App\Http\Requests\AuthUserRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthUserRequest $request, AuthService $authService)
    {
        $credentials = AuthUserDTO::fromArray($request->all());
        $data = $authService->authenticate($credentials);

        return $this->jsonSuccess('Logged in!', $data);
    }
}

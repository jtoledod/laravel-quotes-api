<?php

namespace App\Http\Controllers;

use App\DTO\AuthUserDTO;
use App\Http\Requests\AuthUserRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function authenticate(AuthUserRequest $request, AuthService $authService)
    {
        $credentials = AuthUserDTO::fromArray($request->all());
        $data = $authService->authenticate($credentials);

        return $this->jsonSuccess('Logged in!', $data);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->jsonSuccess('Logged out!');
    }
}

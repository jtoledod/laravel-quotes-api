<?php

namespace App\Services;

use App\DTO\AuthUserDTO;
use App\DTO\UserTokenDTO;
use App\Exceptions\AppException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository)
    {
    }

    public function authenticate(AuthUserDTO $credentials): UserTokenDTO
    {
        if (! Auth::attempt($credentials->toArray())) {
            throw AppException::unauthorized('Invalid credentials');
        }

        $user = $this->userRepository->findOneBy(['email' => $credentials->email]);

        if (! $user) {
            throw AppException::notFound();
        }

        $token = $user->createToken('auth-token');

        return UserTokenDTO::fromArray([
            'user' => $user->toArray(),
            'token' => $token->plainTextToken,
        ]);
    }
}

<?php

namespace App\Services;

use App\DTO\RegisterUserDTO;
use App\DTO\UserTokenDTO;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository) {
    }

    public function registerUser(RegisterUserDTO $registerDto): UserTokenDTO
    {
        $user = $this->userRepository->createUser($registerDto);
        $token = $user->createToken('auth-token');

        return UserTokenDTO::fromArray([
            'user' => $user->toArray(),
            'token' => $token->plainTextToken
        ]);
    }
}

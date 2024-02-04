<?php

namespace App\Services;

use App\DTO\RegisterUserDTO;
use App\DTO\UserTokenDTO;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function registerUser(RegisterUserDTO $registerDto): UserTokenDTO
    {
        $user = $this->userRepository->create([
            ...$registerDto->toArray(),
            'roles' => [User::ROLE_USER],
        ]);

        $token = $user->createToken('auth-token');

        return UserTokenDTO::fromArray([
            'user' => $user->toArray(),
            'token' => $token->plainTextToken,
        ]);
    }
}

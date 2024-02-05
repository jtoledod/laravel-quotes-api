<?php

namespace App\Services;

use App\Enums\UserRole;
use App\DTO\RegisterUserDTO;
use App\DTO\UserTokenDTO;
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
            'roles' => [UserRole::ROLE_USER->value],
        ]);

        $token = $user->createToken('auth-token');

        return UserTokenDTO::fromArray([
            'user' => $user->toArray(),
            'token' => $token->plainTextToken,
        ]);
    }
}

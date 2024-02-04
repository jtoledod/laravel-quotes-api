<?php

namespace App\Services\Users;

use App\Exceptions\AppException;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class ActivateUserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function __invoke(int $id): int
    {
        $user = $this->userRepository->findOneBy([
            'id' => $id,
            'status' => User::STATUS_INACTIVE,
        ]);

        if (!$user) throw AppException::badRequest('Could not process the request');

        return $this->userRepository->update([
            'status' => User::STATUS_ACTIVE,
            'banned_at' => null,
        ], $user->id);
    }
}

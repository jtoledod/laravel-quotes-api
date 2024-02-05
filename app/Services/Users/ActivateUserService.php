<?php

namespace App\Services\Users;

use App\Enums\UserStatus;
use App\Exceptions\AppException;
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
            'status' => UserStatus::STATUS_INACTIVE->value,
        ]);

        if (!$user) throw AppException::badRequest('Could not process the request');

        return $this->userRepository->update([
            'status' => UserStatus::STATUS_ACTIVE->value,
            'banned_at' => null,
        ], $user->id);
    }
}

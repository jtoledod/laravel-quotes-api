<?php

namespace App\Services\Users;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Exceptions\AppException;
use App\Repositories\UserRepositoryInterface;

class BanUserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function __invoke(int $id): int
    {
        $user = $this->userRepository->find($id);

        if (!$user) throw AppException::badRequest('Could not process the request');

        if (in_array(UserRole::ROLE_ADMIN->value, $user->roles)) {
            throw AppException::unauthorized('Cannot ban an admin user');
        }

        if ($user->status == UserStatus::STATUS_INACTIVE->value) {
            throw AppException::unauthorized('The user has been banned already');
        }

        return $this->userRepository->update([
            'status' => UserStatus::STATUS_INACTIVE->value,
            'banned_at' => now(),
        ], $user->id);
    }
}

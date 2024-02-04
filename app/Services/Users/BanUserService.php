<?php

namespace App\Services\Users;

use App\Exceptions\AppException;
use App\Models\User;
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

        if (in_array(User::ROLE_ADMIN, $user->roles)) {
            throw AppException::unauthorized('Cannot ban an admin user');
        }

        if ($user->status == User::STATUS_INACTIVE) {
            throw AppException::unauthorized('The user has been banned already');
        }

        return $this->userRepository->update([
            'status' => User::STATUS_INACTIVE,
            'banned_at' => now(),
        ], $user->id);
    }
}

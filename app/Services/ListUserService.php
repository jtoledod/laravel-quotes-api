<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;

class ListUserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function __invoke(): Arrayable
    {
        return $this->userRepository->findByRoles([UserRole::ROLE_USER->value]);
    }
}

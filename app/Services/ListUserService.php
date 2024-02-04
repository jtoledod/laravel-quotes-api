<?php

namespace App\Services;

use App\Models\User;
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
        return $this->userRepository->findByRoles([User::ROLE_USER]);
    }
}

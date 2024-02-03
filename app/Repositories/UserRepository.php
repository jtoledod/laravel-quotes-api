<?php

namespace App\Repositories;

use App\DTO\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    public function findBy(array $data): Collection
    {
        foreach ($data as $key => $value) {
            if(!isset($user)) {
                $user = User::where($key, $value);
            } else {
                $user->where($key, $value);
            }
        }

        return $user->get();
    }

    public function findOneBy(array $data): ?User
    {
        foreach ($data as $key => $value) {
            if(!isset($user)) {
                $user = User::where($key, $value);
            } else {
                $user->where($key, $value);
            }
        }

        return $user->first();
    }

    public function createUser(RegisterUserDTO $registerUserDTO): User
    {
        return User::create([
            'name' => $registerUserDTO->name,
            'email' => $registerUserDTO->email,
            'password'=> $registerUserDTO->password,
            'roles' => [User::ROLE_USER]
        ]);
    }
}

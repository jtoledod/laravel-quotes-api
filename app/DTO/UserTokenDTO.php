<?php

namespace App\DTO;

class UserTokenDTO implements InterfaceDTO
{
    public function __construct(
        public readonly UserDTO $user,
        public readonly string $token,
    ) {
    }

    public static function fromArray(array $data): UserTokenDTO
    {
        return new self(
            UserDTO::fromArray(data_get($data, 'user')),
            data_get($data, 'token')
        );
    }

    public function toArray(): array
    {
        return [
            'user' => $this->user->toArray(),
            'token' => $this->token,
        ];
    }
}

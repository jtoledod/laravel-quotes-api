<?php

namespace App\DTO;

class AuthUserDTO implements InterfaceDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function fromArray(array $data): AuthUserDTO
    {
        return new self(
            data_get($data, 'email'),
            data_get($data, 'password'),
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}

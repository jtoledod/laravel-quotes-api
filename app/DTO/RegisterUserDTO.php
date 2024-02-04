<?php

namespace App\DTO;

class RegisterUserDTO implements InterfaceDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function fromArray(array $data): RegisterUserDTO
    {
        return new self(
            data_get($data, 'name'),
            data_get($data, 'email'),
            data_get($data, 'password'),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}

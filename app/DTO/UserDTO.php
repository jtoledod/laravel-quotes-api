<?php

namespace App\DTO;

class UserDTO implements InterfaceDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly array $roles,
    ) {
    }

    public static function fromArray(array $data): UserDTO
    {
        return new self(
            data_get($data, 'id'),
            data_get($data, 'name'),
            data_get($data, 'email'),
            data_get($data, 'roles'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
        ];
    }
}

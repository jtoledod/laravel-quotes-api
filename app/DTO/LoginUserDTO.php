<?php

namespace App\DTO;


class LoginUserDTO  implements IDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {

    }

    static public function fromArray(array $data): LoginUserDTO
    {
        return new self (
            data_get($data, 'email'),
            data_get($data, 'password'),
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}

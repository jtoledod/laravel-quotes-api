<?php

namespace App\DTO;

class SaveFavoriteQuoteDTO implements InterfaceDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly UserDTO $userDTO,
        public readonly QuoteDTO $quoteDTO,
        public readonly ?string $created_at,
    ) {
    }

    public static function fromArray(array $data): SaveFavoriteQuoteDTO
    {
        return new self(
            data_get($data, 'id'),
            UserDTO::fromArray(data_get($data, 'user')),
            QuoteDTO::fromArray(data_get($data, 'quote')),
            data_get($data, 'created_at'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user' => $this->userDTO->toArray(),
            'quote' => $this->quoteDTO->toArray(),
            'created_at' => $this->created_at,
        ];
    }
}

<?php

namespace App\DTO;

class QuoteDTO implements InterfaceDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $author,
        public readonly string $quote,
        public readonly ?int $external_id,
    ) {
    }

    public static function fromArray(array $data): QuoteDTO
    {
        return new self(
            data_get($data, 'id'),
            data_get($data, 'author'),
            data_get($data, 'quote'),
            data_get($data, 'external_id'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'author' => $this->author,
            'quote' => $this->quote,
            'external_id' => $this->external_id,
        ];
    }
}

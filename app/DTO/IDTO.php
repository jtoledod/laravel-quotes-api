<?php

namespace App\DTO;

interface IDTO
{
    static public function fromArray(array $data): self;
    public function toArray(): array;
}

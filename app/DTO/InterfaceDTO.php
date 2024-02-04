<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;

interface InterfaceDTO extends Arrayable
{
    public static function fromArray(array $data): self;
}

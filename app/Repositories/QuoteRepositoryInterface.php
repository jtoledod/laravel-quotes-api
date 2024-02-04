<?php

namespace App\Repositories;

use App\DTO\QuoteDTO;
use Illuminate\Contracts\Support\Arrayable;

interface QuoteRepositoryInterface extends RepositoryInterface
{
    public function firstOrCreate(QuoteDTO $dto): Arrayable;
}

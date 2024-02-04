<?php

namespace App\Repositories;

use Illuminate\Contracts\Support\Arrayable;

interface FavoriteQuoteRepositoryInterface extends RepositoryInterface
{
    public function findByUserWithQuotes(int $id): Arrayable;
}

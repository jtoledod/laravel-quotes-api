<?php

namespace App\Services\Quotes;

use App\DTO\UserDTO;
use App\Repositories\FavoriteQuoteRepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;

class ListQuotesService
{
    public function __construct(
        private readonly FavoriteQuoteRepositoryInterface $favoriteRepository
    ) {
    }

    public function __invoke(UserDTO $userDTO): Arrayable
    {
        return $this->favoriteRepository->findByUserWithQuotes($userDTO->id);
    }
}

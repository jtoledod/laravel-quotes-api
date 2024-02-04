<?php

namespace App\Services\Quotes;

use App\DTO\UserDTO;
use App\Exceptions\AppException;
use App\Repositories\Eloquent\FavoriteQuoteRepository;

class RemoveQuoteService
{
    public function __construct(
        private readonly FavoriteQuoteRepository $favoriteQuoteRepository
    ) {
    }

    public function __invoke(UserDTO $userDTO, int $id)
    {
        $favorite = $this->favoriteQuoteRepository->findOneBy([
            'id' => $id,
            'user_id' => $userDTO->id,
        ]);

        if (! $favorite) {
            throw AppException::badRequest('Cannot remove this quote from favorites');
        }

        $this->favoriteQuoteRepository->delete($id);
    }
}

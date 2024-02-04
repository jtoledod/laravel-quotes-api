<?php

namespace App\Services\Quotes;

use App\DTO\SaveFavoriteQuoteDTO;
use App\Exceptions\AppException;
use App\Repositories\FavoriteQuoteRepositoryInterface;
use App\Repositories\QuoteRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class SaveQuoteService
{
    public function __construct(
        private readonly QuoteRepositoryInterface $quoteRepository,
        private readonly FavoriteQuoteRepositoryInterface $favoriteRepository,
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function __invoke(SaveFavoriteQuoteDTO $dto): SaveFavoriteQuoteDTO
    {
        $quote = $this->quoteRepository->firstOrCreate($dto->quoteDTO);

        $favorite = $this->favoriteRepository->findOneBy([
            'user_id' => $dto->userDTO->id,
            'quote_id' => $quote->id,
        ]);

        if ($favorite) {
            throw AppException::badRequest('The quote has been marked as favorite already');
        }

        $favorite = $this->favoriteRepository->create([
            'user_id' => $dto->userDTO->id,
            'quote_id' => $quote->id,
        ]);

        return SaveFavoriteQuoteDTO::fromArray([
            'id' => $favorite->id,
            'user' => $dto->userDTO->toArray(),
            'quote' => $quote->toArray(),
            'created_at' => $favorite->created_at,
        ]);
    }
}

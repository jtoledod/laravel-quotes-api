<?php

namespace App\Repositories\Eloquent;

use App\Models\FavoriteQuote;
use App\Repositories\FavoriteQuoteRepositoryInterface;

final class FavoriteQuoteRepository extends BaseRepository implements FavoriteQuoteRepositoryInterface
{
    public function __construct(FavoriteQuote $model)
    {
        parent::__construct($model);
    }
}

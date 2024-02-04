<?php

namespace App\Repositories\Eloquent;

use App\Models\FavoriteQuote;
use App\Repositories\FavoriteQuoteRepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;

final class FavoriteQuoteRepository extends BaseRepository implements FavoriteQuoteRepositoryInterface
{
    public function __construct(FavoriteQuote $model)
    {
        parent::__construct($model);
    }

    public function findByUserWithQuotes(int $id): Arrayable
    {
        return $this->getFindQuery(['user_id' => $id])->with('quote')->get();
    }
}

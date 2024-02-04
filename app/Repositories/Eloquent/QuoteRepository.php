<?php

namespace App\Repositories\Eloquent;

use App\DTO\QuoteDTO;
use App\Models\Quote;
use App\Repositories\QuoteRepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;

final class QuoteRepository extends BaseRepository implements QuoteRepositoryInterface
{
    public function __construct(Quote $model)
    {
        parent::__construct($model);
    }

    public function firstOrCreate(QuoteDTO $dto): Arrayable
    {
        return $this->model->firstOrCreate([
            'author' => $dto->author,
            'quote' => $dto->quote,
            'external_id' => $dto->external_id,
        ]);
    }
}

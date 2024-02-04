<?php

namespace App\Services\Client;

class QuotesClient extends AbstractClient
{
    protected function baseUrl(): string
    {
        return config('services.quotes_api.base_url');
    }

    public function getQuotes(?int $limit = null, ?int $skip = null)
    {
        $query = null;

        if (is_numeric($limit) && is_numeric($skip)) {
            $query = [
                'limit' => $limit,
                'skip' => $skip,
            ];
        }

        return $this->getBaseRequest()->get('/', $query);
    }

    public function getRandomQuote()
    {
        return $this->getBaseRequest()->get('/random');
    }
}

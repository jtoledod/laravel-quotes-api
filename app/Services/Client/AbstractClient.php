<?php

namespace App\Services\Client;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractClient
{
    protected function getBaseRequest(): PendingRequest
    {
        $request = Http::acceptJson()
            ->contentType('application/json')
            ->throw()
            ->baseUrl($this->baseUrl());

        return $this->authorize($request);
    }

    protected function authorize(PendingRequest $request): PendingRequest
    {
        return $request;
    }

    abstract protected function baseUrl(): string;
}

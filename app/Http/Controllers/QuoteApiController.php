<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Http\Requests\QuotesRequest;
use App\Services\Client\QuotesClient;
use Exception;

class QuoteApiController extends Controller
{
    public function allQuotes(QuotesRequest $request, QuotesClient $client)
    {
        try {
            $response = $client->getQuotes($request->query('limit'), $request->query('skip'));
        } catch (Exception $e) {

            report($e);
            throw AppException::internalServerError('Error processing request.');
        }

        return $this->jsonSuccess('Success', $response->json());
    }

    public function randomQuote(QuotesClient $client)
    {
        try {
            $response = $client->getRandomQuote();
        } catch (Exception $e) {

            report($e);
            throw AppException::internalServerError('Error processing request.');
        }

        return $this->jsonSuccess('Success', $response->json());
    }
}

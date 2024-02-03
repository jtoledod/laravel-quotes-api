<?php

namespace App\Exceptions;

use App\Traits\HttpJsonResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppException extends Exception
{
    use HttpJsonResponse;

    private function __construct(
        string $message,
        int $code
    ) {
        parent::__construct($message, $code);
    }

    static public function badRequest(string $message = 'Bad request')
    {
        return new self($message, 400);
    }

    static public function unauthorized(string $message = 'Unauthorized')
    {
        return new self($message, 401);
    }

    static public function forbidden(string $message = 'Forbidden')
    {
        return new self($message, 403);
    }

    static public function notFound(string $message = 'Not found')
    {
        return new self($message, 404);
    }

    static public function internalServerError(string $message = "Internal server error")
    {
        return new self($message, 500);
    }

    public function render(Request $request): ?JsonResponse
    {
        if($request->expectsJson()) {
            return $this->handleJsonException($this->getCode(), $this->getMessage());
        }
    }

    public function handleJsonException(int $code, string $message = ''): JsonResponse
    {
        switch($code) {
            case Response::HTTP_BAD_REQUEST:
                return $this->badRequestResponse($message);
                break;
            case Response::HTTP_NOT_FOUND:
                return $this->notFoundResponse($message);
                break;
            case Response::HTTP_UNAUTHORIZED:
                return $this->unauthorizedResponse($message);
                break;
            case Response::HTTP_FORBIDDEN:
                return $this->forbiddenResponse($message);
                break;
            case Response::HTTP_INTERNAL_SERVER_ERROR:
            default:
                return $this->internalServerErrorResponse($message);
                break;
        }
    }
}

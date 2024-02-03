<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait HttpJsonResponse {

    public function successResponse(string $message, $data = null): JsonResponse
    {
        return response()->json(["message" => $message, "data" => $data], Response::HTTP_OK);
    }

    public function badRequestResponse(string $message): JsonResponse
    {
        $code = Response::HTTP_BAD_REQUEST;
        return response()->json(["code" => $code, "message" => $message], $code);
    }

    public function notFoundResponse(string $message): JsonResponse
    {
        $code = Response::HTTP_NOT_FOUND;
        return response()->json(["code" => $code, "message" => $message], $code);
    }

    public function unauthorizedResponse(string $message): JsonResponse
    {
        $code = Response::HTTP_UNAUTHORIZED;
        return response()->json(["code" => $code, "message" => $message], $code);
    }

    public function forbiddenResponse(string $message): JsonResponse
    {
        $code = Response::HTTP_UNAUTHORIZED;
        return response()->json(["code" => $code, "message" => $message ], $code);
    }

    public function internalServerErrorResponse(string $message): JsonResponse
    {
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        return response()->json(["code" => $code, "message" => $message ], $code);
    }

}

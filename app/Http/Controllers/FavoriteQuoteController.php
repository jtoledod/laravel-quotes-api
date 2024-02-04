<?php

namespace App\Http\Controllers;

use App\DTO\SaveFavoriteQuoteDTO;
use App\DTO\UserDTO;
use App\Http\Requests\QuotePostRequest;
use App\Http\Resources\FavoriteQuoteResource;
use App\Services\Quotes\ListQuotesService;
use App\Services\Quotes\SaveQuoteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListQuotesService $listQuotesService)
    {
        $user = $request->user();
        $data = $listQuotesService->__invoke(UserDTO::fromArray($user->toArray()));

        return $this->jsonSuccess('Success', FavoriteQuoteResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuotePostRequest $request, SaveQuoteService $saveQuoteService): JsonResponse
    {
        $user = $request->user();

        $dto = SaveFavoriteQuoteDTO::fromArray([
            'quote' => $request->all(),
            'user' => $user->toArray(),
        ]);

        $data = $saveQuoteService->__invoke($dto, $user);

        return $this->jsonSuccess('Quote marked as favorite', $data->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

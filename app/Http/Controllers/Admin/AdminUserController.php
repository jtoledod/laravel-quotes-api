<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\ListUserService;

class AdminUserController extends Controller
{
    public function index(ListUserService $listUserService)
    {
        $data = $listUserService->__invoke();

        return $this->jsonSuccess('Success', UserResource::collection($data));
    }
}

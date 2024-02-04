<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\ListUserService;
use App\Services\Users\ActivateUserService;
use App\Services\Users\BanUserService;

class AdminUserController extends Controller
{
    public function index(ListUserService $listUserService)
    {
        $data = $listUserService->__invoke();

        return $this->jsonSuccess('Success', UserResource::collection($data));
    }

    public function ban(BanUserService $banUserService, int $id)
    {
        $banUserService->__invoke($id);

        return $this->jsonSuccess('The user has been banned');
    }

    public function activate(ActivateUserService $activateUserService, int $id)
    {
        $activateUserService->__invoke($id);

        return $this->jsonSuccess('The user has been activated');
    }
}

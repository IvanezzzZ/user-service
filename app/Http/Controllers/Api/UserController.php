<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function getAuthUser(Request $request)
    {
        return new UserResource($request->user());
    }

    public function updateAuthUser(UpdateUserRequest $request)
    {
        //
    }
}

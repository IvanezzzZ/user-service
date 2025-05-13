<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRoleUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function updateRole(User $user, UpdateRoleUserRequest $request): UserResource
    {
        $user->update($request->validated());

        return new UserResource($user);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRoleUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;


class UserController extends Controller
{
    public function updateRole(User $user, UpdateRoleUserRequest $request): UserResource
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    public function index(): ResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => __('messages.profile_deleted')]);
    }
}

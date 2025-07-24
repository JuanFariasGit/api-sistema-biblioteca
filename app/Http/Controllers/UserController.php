<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $data = $this->userRepository->create($validated);

        return new UserResource($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userRepository->create($validated);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }
}

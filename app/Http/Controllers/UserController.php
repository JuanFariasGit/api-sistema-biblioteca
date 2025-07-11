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
        
        $data = $this->userRepository->create($validated);

        $token = auth('api')->attempt($validated);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => [
                'id' => $data->id,
                'name' => $data->name,
                'email' => $data->email
            ]
        ]);
    }
}

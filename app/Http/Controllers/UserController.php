<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        
        $data = $this->userService->create($validated);

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

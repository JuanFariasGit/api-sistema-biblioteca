<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class StoreUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreUserRequest $request)
    {
        $validated = $request->validated();
        
        $data = User::create($validated);

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

<?php

namespace App\Http\Controllers;


class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Email e/ou senha estão incorretos!'], 401);
        }

        return $this->respondWithCookie($token);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Deslogado com sucesso!']);
    }

    public function refresh()
    {
        return $this->respondWithCookie(auth('api')->refresh());
    }

    protected function respondWithCookie($token)
    {
        $user = auth('api')->user();

        $cookie = cookie(
            'jwt',
            $token,
            auth('api')
                ->factory()
                ->getTTL(),
            '/',
            null,
            config('app.env') == 'production',
            true,
            false,
            'strict'
        );

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ])->withCookie($cookie);
    }
}

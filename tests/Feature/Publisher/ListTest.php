<?php

use App\Models\{
    Publisher,
    User
};


it('only users with valid tokens can list publishers', function () {
    $this->withToken('token-invalid')->postJson('/api/publishers', [
        'name' => 'Publisher 1'
    ])->assertStatus(401);
});

it('should be a pagination', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    Publisher::factory()
        ->count(100)
        ->for($user)
        ->create();

    $this->withToken($accessToken)->getJson('/api/publishers')
        ->assertJsonCount(10, 'data')
        ->assertStatus(200);
});

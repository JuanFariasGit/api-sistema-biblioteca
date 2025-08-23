<?php

use App\Models\User;

it('only users with valid tokens can create editors', function () {
    $data = [
        'name' => 'Publisher 1',
    ];

    $this->withToken('token-invalid')->postJson('/api/publishers', $data)
        ->assertStatus(401);
});

it('should be able to create a publisher', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $data = [
        'name' => 'Publisher 1',
    ];

    $this->withToken($accessToken)->postJson('/api/publishers', $data)
        ->assertStatus(201);
});

it('name should be required', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $this->withToken($accessToken)->postJson('/api/publishers', [])
        ->assertJsonValidationErrorFor('name');
});

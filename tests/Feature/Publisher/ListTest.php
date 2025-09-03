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
        ->assertJsonStructure([
            'data' => [
                0 => [
                    'name',
                    'user_id',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                    'books'
                ]
            ],
            'links' => [],
            'meta' => [
                'total',
                'last_page',
                'per_page',
                'links',
                'current_page',
                'from',
                'to',
                'path'
            ],
        ])
        ->assertStatus(200);
});

it('the user should only view their publishers', function() {
    $userA = User::factory()->create();
    
    $accessTokenA = $this->postJson('/api/auth/login', [
        'email' => $userA->email,
        'password' => 'password',
    ])->json()['access_token'];

    Publisher::factory()
        ->count(10)
        ->for($userA)
        ->create();
    
    $responseA = $this->withToken($accessTokenA)->getJson('/api/publishers');
    
    $userB = User::factory()->create();

    $accessTokenB = $this->postJson('/api/auth/login', [
        'email' => $userB->email,
        'password' => 'password',
    ])->json()['access_token'];
    
    $responseB = $this->withToken($accessTokenB)->getJson('/api/publishers');
    
    $this->assertNotEquals($responseA['data'], $responseB['data']);
});

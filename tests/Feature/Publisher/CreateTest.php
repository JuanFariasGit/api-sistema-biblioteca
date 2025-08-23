<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

it('only users with valid tokens can create publishers', function () {
    $this->withToken('token-invalid')->postJson('/api/publishers', [
        'name' => 'Publisher 1'
    ])->assertStatus(401);
});

it('should be able to create a publisher', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $this->withToken($accessToken)->postJson('/api/publishers', [
        'name' => 'Publisher 1'
    ])
    ->assertStatus(201)
    ->assertJson(function (AssertableJson $json) {
        $json->whereType('data.id', 'string');
        $json->whereType('data.user_id', 'string');
        $json->whereType('data.name', 'string');
        $json->whereType('data.created_at', 'string');
        $json->whereType('data.updated_at', 'string');
    });
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

it('name should be a string', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $this->withToken($accessToken)->postJson('/api/publishers', [
        'name' => 0
    ])->assertJsonValidationErrorFor('name');
});

it('name should have at least 4 characters', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $this->withToken($accessToken)->postJson('/api/publishers', [
        'name' => 'pu'
    ])->assertJsonValidationErrorFor('name');
});

it('name should have a maximum of 255 characters', function () {
    $user = User::factory()->create();

    $accessToken = $this->postJson('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->json()['access_token'];

    $this->withToken($accessToken)->postJson('/api/publishers', [
        'name' => str_repeat('p', 256)
    ])->assertJsonValidationErrorFor('name');
});

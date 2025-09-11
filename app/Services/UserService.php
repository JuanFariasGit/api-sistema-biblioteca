<?php

namespace App\Services;

use App\Models\User;

class UserService extends Service
{
    public function __construct(private User $user)
    {
        parent::__construct($user);
    }
} 

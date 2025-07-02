<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    protected function model(): User
    {   
        return app(User::class);
    }
} 

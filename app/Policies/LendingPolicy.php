<?php

namespace App\Policies;

use App\Models\Lending;
use App\Models\User;

class LendingPolicy
{
    public function own(User $user, Lending $lending)
    {
        return $user->id == $lending->user_id;
    }
}

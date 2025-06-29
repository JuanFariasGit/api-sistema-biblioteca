<?php

namespace App\Policies;

use App\Models\Reader;
use App\Models\User;

class ReaderPolicy
{
    public function own(User $user, Reader $reader)
    {
        return $user->id == $reader->user_id;
    }
}

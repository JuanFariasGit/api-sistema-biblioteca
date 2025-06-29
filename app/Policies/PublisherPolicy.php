<?php

namespace App\Policies;

use App\Models\Publisher;
use App\Models\User;

class PublisherPolicy
{
    public function own(User $user, Publisher $publisher)
    {
        return $user->id == $publisher->user_id;
    }
}

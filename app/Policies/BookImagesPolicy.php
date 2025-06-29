<?php

namespace App\Policies;

use App\Models\BookImages;
use App\Models\User;

class BookImagesPolicy
{
    public function own(User $user, BookImages $bookImages)
    {
        return $user->id == $bookImages->user_id;
    }
}

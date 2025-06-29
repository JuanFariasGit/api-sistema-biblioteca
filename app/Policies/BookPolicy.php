<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function own(User $user, Book $book)
    {
        return $user->id == $book->user_id;
    }
}

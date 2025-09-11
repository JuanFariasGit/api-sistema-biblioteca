<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait ScopesGlobally
{
    public function scopeAuthApiUser(Builder $query)
    {
        $query->where('user_id', Auth::guard('api')
            ->user()
            ->id
        );        
    }
}

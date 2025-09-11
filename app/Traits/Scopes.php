<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Scopes
{
    public function scopeAuthApiUser()
    {
        return $this->where('user_id', Auth::guard('api')
            ->user()
            ->id
        );        
    }
}

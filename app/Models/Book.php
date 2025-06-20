<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasUuids; 

    protected $guarded = []; 

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}

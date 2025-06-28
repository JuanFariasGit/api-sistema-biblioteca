<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lending extends Model
{
    use HasUuids, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'lending_date' => 'date:Y-m-d',
            'due_date' => 'date:Y-m-d',
        ];
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class)->whereNull('deleted_at');
    }

    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class)->whereNull('deleted_at');
    }
}

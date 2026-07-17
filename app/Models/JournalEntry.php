<?php

namespace App\Models;

use App\Enums\Mood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalEntry extends Model
{
    protected $fillable = [
        "user_id",
        "title",
        "content",
        "mood",
        "is_archived",
    ];

    protected function casts(): array
    {
        return [
            'mood' => Mood::class,
            'is_archived' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

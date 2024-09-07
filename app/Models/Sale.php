<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'yes_amount',
        'no_amount',
        'calls_amount',
        'follow_through_amount',
        'target_amount',
        'cost_per_customer',
        'sold',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
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

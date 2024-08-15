<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Finance extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'amount_available',
        'savings',
        'fixed_costs'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

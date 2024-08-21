<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinanceCategory extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'name',
        'description',
        'daily_amount',
        'monthly_average',
        'total_amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function updateDailyAmounts()
    {
        $financeCategories = self::all();
        foreach ($financeCategories as $financeCategory) {
            if ($financeCategory->daily_amount != 0) {
                $totalAmount = $financeCategory->total_amount;
                $financeCategory->total_amount = $totalAmount + $financeCategory->daily_amount;
                $financeCategory->save();
            }
        }
    }
}

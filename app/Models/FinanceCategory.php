<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceCategory extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'daily_amount',
        'monthly_average',
        'total_amount',
    ];

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

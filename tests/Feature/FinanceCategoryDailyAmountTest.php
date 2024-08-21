<?php

namespace Tests\Feature;

use App\Models\FinanceCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinanceCategoryDailyAmountTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_it_updates_total_amount_by_daily_amount(): void
    {
        $user = User::create([
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ]);

        // Create finance categories
        $category1 = FinanceCategory::create([
            'name' => 'test',
            'user_id' => $user->id,
            'daily_amount' => 10,
            'total_amount' => 200,
        ]);
        $category2 = FinanceCategory::create([
            'name' => 'test',
            'user_id' => $user->id,
            'daily_amount' => 5,
            'total_amount' => 100,
        ]);
        $category3 = FinanceCategory::create([
            'name' => 'test',
            'user_id' => $user->id,
            'daily_amount' => 50,
            'total_amount' => 400,
        ]);
        $category4 = FinanceCategory::create([
            'name' => 'test',
            'user_id' => $user->id,
            'daily_amount' => 60,
            'total_amount' => 350,
        ]);

        FinanceCategory::updateDailyAmounts();

        $category1->refresh();
        $category2->refresh();
        $category3->refresh();
        $category4->refresh();

        $this->assertEquals(210, $category1->total_amount);
        $this->assertEquals(105, $category2->total_amount);
        $this->assertEquals(450, $category3->total_amount);
        $this->assertEquals(410, $category4->total_amount);
    }
}

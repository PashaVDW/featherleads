<?php

namespace Database\Seeders;

use App\Models\Finance;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $finance = Finance::create([
            'savings' => 0,
            'fixed_costs' => 0,
            'amount_available' => 0,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'finance_id' => $finance->id,
        ]);
    }
}

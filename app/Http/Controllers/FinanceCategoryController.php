<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyExpenseRequest;
use App\Http\Requests\FinanceCategoryRequest;
use App\Models\FinanceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceCategoryController extends Controller
{
    public function store(FinanceCategoryRequest $request)
    {
        $validated = $request->validated();

        FinanceCategory::create([
            'name' => $validated['finance_category_name'],
            'description' => $validated['finance_category_description'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('finance.index')->with('success', 'Finance Category record updated successfully!');
    }

    public function addDailyExpense(DailyExpenseRequest $request)
    {
        $financeCategory = FinanceCategory::findOrFail($request['id']);
        $currentAmount = $financeCategory->daily_amount;

        $financeCategory->daily_amount = $currentAmount + $request['daily_expense'];
        $financeCategory->save();

        return redirect()->route('finance.index')->with('success', 'Daily Expenses have been updated successfully!');

    }

    public function clearDailyExpense(Request $request)
    {
        $financeCategory = FinanceCategory::findOrFail($request['id']);
        $financeCategory->daily_amount = 0;
        $financeCategory->save();

        return redirect()->route('finance.index')->with('success', 'Daily expenses have successfully been reset');
    }
}
